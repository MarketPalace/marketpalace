<?php

declare(strict_types=1);

/**
 * Contains the Checkout facade class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Checkout\Facades;

use Illuminate\Support\Facades\Facade;
use App\Containers\MarketPalace\Checkout\Contracts\CheckoutState;
use App\Ship\Contracts\MarketPalace\Address;
use App\Ship\Contracts\MarketPalace\BillPayer;
use App\Ship\Contracts\MarketPalace\CheckoutSubject;

/**
 * @method static getCart(): ?CheckoutSubject
 * @method static setCart(CheckoutSubject $cart)
 * @method static getState(): CheckoutState
 * @method static setState(CheckoutState|string $state)
 * @method static getBillPayer(): BillPayer
 * @method static setBillPayer(BillPayer $billpayer)
 * @method static getShippingAddress(): Address
 * @method static setShippingAddress(Address $address)
 * @method static setCustomAttribute(string $key, $value): void
 * @method static getCustomAttribute(string $key)
 * @method static putCustomAttributes(array $data): void
 * @method static getCustomAttributes(): array
 * @method static update(array $data);
 * @method static total(): float
 */
class Checkout extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'marketpalace.checkout';
    }
}
