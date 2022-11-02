<?php

declare(strict_types=1);

/**
 * Contains the RequestStore class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Checkout\Drivers;

use Illuminate\Support\Arr;
use App\Containers\MarketPalace\Checkout\Contracts\CheckoutDataFactory;
use App\Containers\MarketPalace\Checkout\Contracts\CheckoutStore;
use App\Containers\MarketPalace\Checkout\Traits\EmulatesFillAttributes;
use App\Containers\MarketPalace\Checkout\Traits\HasCart;
use App\Containers\MarketPalace\Checkout\Traits\HasCheckoutState;
use App\Ship\Contracts\MarketPalace\Address;
use App\Ship\Contracts\MarketPalace\BillPayer;

/**
 * Stores & fetches checkout data across http requests.
 * This is a simple and lightweight and variant for
 * cases when having volatile checkout data is ✔
 */
class RequestStore implements CheckoutStore
{
    use HasCheckoutState;
    use HasCart;
    use EmulatesFillAttributes;

    protected $state;

    /** @var  BillPayer */
    protected $billpayer;

    /** @var  Address */
    protected $shippingAddress;

    /** @var  CheckoutDataFactory */
    protected $dataFactory;

    /** @var array */
    protected $customData = [];

    public function __construct($config, CheckoutDataFactory $dataFactory)
    {
        $this->dataFactory = $dataFactory;
        $this->billpayer = $dataFactory->createBillPayer();
        $this->shippingAddress = $dataFactory->createShippingAddress();
    }

    /**
     * @inheritdoc
     */
    public function update(array $data)
    {
        $this->updateBillPayer($data['billpayer'] ??  []);

        if (Arr::get($data, 'ship_to_billing_address')) {
            $shippingAddress = $data['billpayer']['address'];
            $shippingAddress['name'] = $this->getShipToName();
        } else {
            $shippingAddress = $data['shippingAddress'] ?? [];
        }

        $this->updateShippingAddress($shippingAddress);
    }

    /**
     * @inheritdoc
     */
    public function total()
    {
        return $this->cart->total();
    }

    /**
     * @inheritdoc
     */
    public function getBillPayer(): BillPayer
    {
        return $this->billpayer;
    }

    /**
     * @inheritdoc
     */
    public function setBillPayer(BillPayer $billpayer)
    {
        $this->billpayer = $billpayer;
    }

    /**
     * @inheritdoc
     */
    public function getShippingAddress(): Address
    {
        return $this->shippingAddress;
    }

    /**
     * @inheritdoc
     */
    public function setShippingAddress(Address $address)
    {
        return $this->shippingAddress = $address;
    }

    public function setCustomAttribute(string $key, $value): void
    {
        Arr::set($this->customData, $key, $value);
    }

    public function getCustomAttribute(string $key)
    {
        return Arr::get($this->customData, $key);
    }

    public function putCustomAttributes(array $data): void
    {
        $this->customData = $data;
    }

    public function getCustomAttributes(): array
    {
        return $this->customData;
    }

    /**
     * @inheritdoc
     */
    protected function updateBillPayer($data)
    {
        $this->fill($this->billpayer, Arr::except($data, 'address'));
        $this->fill($this->billpayer->address, $data['address']);
    }

    /**
     * @inheritdoc
     */
    protected function updateShippingAddress($data)
    {
        $this->fill($this->shippingAddress, $data);
    }

    private function fill($target, array $attributes)
    {
        if (method_exists($target, 'fill')) {
            $target->fill($attributes);
        } else {
            $this->fillAttributes($target, $attributes);
        }
    }

    private function getShipToName()
    {
        if ($this->billpayer->isOrganization()) {
            return sprintf(
                '%s (%s)',
                $this->billpayer->getCompanyName(),
                $this->billpayer->getFullName()
            );
        }

        return $this->billpayer->getName();
    }
}
