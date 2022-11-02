<?php

declare(strict_types=1);

/**
 * Contains the Checkout interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Checkout\Contracts;

use App\Containers\MarketPalace\Contracts\Address;
use App\Containers\MarketPalace\Contracts\BillPayer;
use App\Containers\MarketPalace\Contracts\CheckoutSubject;

interface Checkout
{
    /**
     * Returns the cart
     *
     * @return CheckoutSubject|null
     */
    public function getCart();

    /**
     * Set the cart for the checkout
     *
     * @param CheckoutSubject $cart
     */
    public function setCart(CheckoutSubject $cart);

    /**
     * Returns the state of the checkout
     *
     * @return CheckoutState
     */
    public function getState(): CheckoutState;

    /**
     * Sets the state of the checkout
     *
     * @param CheckoutState|string $state
     */
    public function setState($state);

    /**
     * Returns the bill payer details
     *
     * @return BillPayer
     */
    public function getBillPayer(): BillPayer;

    /**
     * Sets the bill payer details
     *
     * @param BillPayer $billpayer
     */
    public function setBillPayer(BillPayer $billpayer);

    /**
     * Returns the shipping address
     *
     * @return Address
     */
    public function getShippingAddress(): Address;

    /**
     * Sets the shipping address
     *
     * @param Address $address
     */
    public function setShippingAddress(Address $address);

    public function setCustomAttribute(string $key, $value): void;

    public function getCustomAttribute(string $key);

    public function putCustomAttributes(array $data): void;

    public function getCustomAttributes(): array;

    /**
     * Update checkout data with an array of attributes
     *
     * @deprecated
     *
     * @param array $data
     */
    public function update(array $data);

    /**
     * Returns the grand total of the checkout
     *
     * @return float
     */
    public function total();
}
