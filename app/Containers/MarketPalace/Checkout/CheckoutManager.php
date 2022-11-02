<?php

declare(strict_types=1);

/**
 * Contains the Checkout Manager class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Checkout;

use App\Containers\MarketPalace\Checkout\Contracts\Checkout as CheckoutContract;
use App\Containers\MarketPalace\Checkout\Contracts\CheckoutState as CheckoutStateContract;
use App\Containers\MarketPalace\Checkout\Contracts\CheckoutStore;
use App\Ship\Contracts\MarketPalace\Address;
use App\Ship\Contracts\MarketPalace\BillPayer;
use App\Ship\Contracts\MarketPalace\CheckoutSubject;

class CheckoutManager implements CheckoutContract
{
    /** @var  CheckoutStore */
    protected $store;

    public function __construct(CheckoutStore $store)
    {
        $this->store = $store;
    }

    /**
     * @inheritDoc
     */
    public function getCart()
    {
        return $this->store->getCart();
    }

    /**
     * @inheritDoc
     */
    public function setCart(CheckoutSubject $cart)
    {
        $this->store->setCart($cart);
    }

    /**
     * @inheritdoc
     */
    public function getState(): CheckoutStateContract
    {
        return $this->store->getState();
    }

    /**
     * @inheritdoc
     */
    public function setState($state)
    {
        $this->store->setState($state);
    }

    /**
     * @inheritdoc
     */
    public function getBillPayer(): BillPayer
    {
        return $this->store->getBillPayer();
    }

    /**
     * @inheritdoc
     */
    public function setBillPayer(BillPayer $billpayer)
    {
        return $this->store->setBillPayer($billpayer);
    }

    /**
     * @inheritdoc
     */
    public function getShippingAddress(): Address
    {
        return $this->store->getShippingAddress();
    }

    /**
     * @inheritDoc
     */
    public function setShippingAddress(Address $address)
    {
        $this->store->setShippingAddress($address);
    }

    public function setCustomAttribute(string $key, $value): void
    {
        $this->store->setCustomAttribute($key, $value);
    }

    public function getCustomAttribute(string $key)
    {
        return $this->store->getCustomAttribute($key);
    }

    public function putCustomAttributes(array $data): void
    {
        $this->store->putCustomAttributes($data);
    }

    public function getCustomAttributes(): array
    {
        return $this->store->getCustomAttributes();
    }

    /**
     * @inheritdoc
     */
    public function update(array $data)
    {
        $this->store->update($data);
    }

    /**
     * @inheritDoc
     */
    public function total()
    {
        return $this->store->total();
    }
}
