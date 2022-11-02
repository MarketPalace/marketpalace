<?php

declare(strict_types=1);

/**
 * Contains the SessionStore class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace MarketPalace\Checkout\Drivers;

use Illuminate\Contracts\Session\Session;
use MarketPalace\Checkout\Contracts\CheckoutState;
use MarketPalace\Checkout\Contracts\CheckoutStore;
use MarketPalace\Checkout\Models\CheckoutStateProxy;
use MarketPalace\Checkout\Traits\HasCart;
use MarketPalace\Contracts\Address;
use MarketPalace\Contracts\BillPayer;

class SessionStore implements CheckoutStore
{
    use HasCart;

    private const DEFAULT_PREFIX = 'vanilo_checkout__';

    protected Session $session;

    protected string $prefix;

    public function __construct(Session $session = null, string $prefix = null)
    {
        $this->session = $session ?? app('session.store');
        $this->prefix = $prefix ?? static::DEFAULT_PREFIX;
    }

    public function getState(): CheckoutState
    {
        $rawState = $this->retrieveData('state');

        return $rawState instanceof CheckoutState ? $rawState : CheckoutStateProxy::create($rawState);
    }

    public function setState($state)
    {
        $this->storeData('state', $state instanceof CheckoutState ? $state->value() : $state);
    }

    public function getBillPayer(): BillPayer
    {
        // TODO: Implement getBillPayer() method.
    }

    public function setBillPayer(BillPayer $billpayer)
    {
        // TODO: Implement setBillPayer() method.
    }

    public function getShippingAddress(): Address
    {
        // TODO: Implement getShippingAddress() method.
    }

    public function setShippingAddress(Address $address)
    {
        // TODO: Implement setShippingAddress() method.
    }

    public function setCustomAttribute(string $key, $value): void
    {
        $this->storeData("custom_attr__{$key}", $value);
    }

    public function getCustomAttribute(string $key)
    {
        return $this->retrieveData("custom_attr__{$key}");
    }

    public function putCustomAttributes(array $data): void
    {
        // TODO: Implement putCustomAttributes() method.
    }

    public function getCustomAttributes(): array
    {
        // TODO: Implement getCustomAttributes() method.
    }

    public function update(array $data)
    {
        // TODO: Implement update() method.
    }

    public function total()
    {
        // TODO: Implement total() method.
    }

    protected function storeData(string $key, mixed $value): void
    {
        $this->session->put($this->prefix . $key, $value);
    }

    protected function retrieveData(string $key): mixed
    {
        return $this->session->get($this->prefix . $key);
    }
}
