<?php

declare(strict_types=1);

/**
 * Contains the HasCart trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Checkout\Traits;

use App\Ship\Contracts\MarketPalace\CheckoutSubject;

trait HasCart
{
    /** @var  CheckoutSubject */
    protected $cart;

    /**
     * Returns the cart
     *
     * @return CheckoutSubject|null
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set the cart for the checkout
     *
     * @param CheckoutSubject $cart
     */
    public function setCart(CheckoutSubject $cart)
    {
        $this->cart = $cart;
    }
}
