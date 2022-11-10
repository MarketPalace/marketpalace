<?php

declare(strict_types=1);

/**
 * Contains the OrderFactory class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalce
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Order\Factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Containers\MarketPalace\Address\Contracts\AddressType;
use App\Containers\MarketPalace\Address\Models\AddressProxy;
use App\Containers\MarketPalace\Address\Enums\AddressTypeProxy;
use App\Ship\Contracts\MarketPalace\Address;
use App\Ship\Contracts\MarketPalace\Buyable;
use App\Containers\MarketPalace\Order\Contracts\BillPayer;
use App\Containers\MarketPalace\Order\Contracts\Order;
use App\Containers\MarketPalace\Order\Contracts\OrderFactory as OrderFactoryContract;
use App\Containers\MarketPalace\Order\Contracts\OrderNumberGenerator;
use App\Containers\MarketPalace\Order\Events\OrderWasCreated;
use App\Containers\MarketPalace\Order\Exceptions\CreateOrderException;

class OrderFactory implements OrderFactoryContract
{
    /** @var OrderNumberGenerator */
    protected OrderNumberGenerator $orderNumberGenerator;

    public function __construct(OrderNumberGenerator $generator)
    {
        $this->orderNumberGenerator = $generator;
    }

    /**
     * @inheritDoc
     */
    public function createFromDataArray(array $data, array $items): Order
    {
        if (empty($items)) {
            throw new CreateOrderException(__('Can not create an order without items'));
        }

        DB::beginTransaction();

        try {
            $order = app(Order::class);

            $order->fill(Arr::except($data, ['billpayer', 'shippingAddress']));
            $order->number = $data['number'] ?? $this->orderNumberGenerator->generateNumber($order);
            $order->user_id = $data['user_id'] ?? auth()->id();
            $order->save();

            $this->createBillPayer($order, $data);
            $this->createShippingAddress($order, $data);

            $this->createItems(
                $order,
                array_map(function ($item) {
                    // Default quantity is 1 if unspecified
                    $item['quantity'] = $item['quantity'] ?? 1;

                    return $item;
                }, $items)
            );

            $order->save();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        DB::commit();

        event(new OrderWasCreated($order));

        return $order;
    }

    protected function createShippingAddress(Order $order, array $data)
    {
        if ($address = isset($data['shippingAddress'])) {
            $order->shippingAddress()->associate(
                $this->createOrCloneAddress($data['shippingAddress'], AddressTypeProxy::SHIPPING())
            );
        }
    }

    protected function createBillPayer(Order $order, array $data)
    {
        if (isset($data['billpayer'])) {
            $address = $this->createOrCloneAddress($data['billpayer']['address'], AddressTypeProxy::BILLING());

            $billpayer = app(BillPayer::class);
            $billpayer->fill(Arr::except($data['billpayer'], 'address'));
            $billpayer->address()->associate($address);
            $billpayer->save();

            $order->billpayer()->associate($billpayer);
        }
    }

    protected function createItems(Order $order, array $items)
    {
        $that = $this;
        $hasBuyables = collect($items)->contains(function ($item) use ($that) {
            return $that->itemContainsABuyable($item);
        });

        if (!$hasBuyables) { // This is faster
            $order->items()->createMany($items);
        } else {
            foreach ($items as $item) {
                $this->createItem($order, $item);
            }
        }
    }

    /**
     * Creates a single item for the given order
     *
     * @param Order $order
     * @param array $item
     */
    protected function createItem(Order $order, array $item)
    {
        if ($this->itemContainsABuyable($item)) {
            /** @var Buyable $product */
            $product = $item['product'];
            $item = array_merge($item, [
                'product_type' => $product->morphTypeName(),
                'product_id' => $product->getId(),
                'price' => $product->getPrice(),
                'name' => $product->getName()
            ]);
            unset($item['product']);
        }

        $order->items()->create($item);
    }

    /**
     * Returns whether an instance contains a buyable object
     *
     * @param array $item
     *
     * @return bool
     */
    private function itemContainsABuyable(array $item)
    {
        return isset($item['product']) && $item['product'] instanceof Buyable;
    }

    private function addressToAttributes(Address $address)
    {
        return [
            'name' => $address->getName(),
            'postalcode' => $address->getPostalCode(),
            'country_id' => $address->getCountryCode(),
            /** @todo Convert Province code to province_id */
            'city' => $address->getCity(),
            'address' => $address->getAddress(),
        ];
    }

    /**
     * @throws CreateOrderException
     */
    private function createOrCloneAddress($address, AddressType $type = null)
    {
        if ($address instanceof Address) {
            $address = $this->addressToAttributes($address);
        } elseif (!is_array($address)) {
            throw new CreateOrderException(
                sprintf(
                    'Address data is %s but it should be either an Address or an array',
                    gettype($address)
                )
            );
        }

        $type = is_null($type) ? AddressTypeProxy::defaultValue() : $type;
        $address['type'] = $type;
        $address['name'] = empty(Arr::get($address, 'name')) ? '-' : $address['name'];

        return AddressProxy::create($address);
    }
}
