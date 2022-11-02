<?php

declare(strict_types=1);

/**
 * Contains the AssignUserToCart class.
 *
 * @copyright   Copyright (c) 2018 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Cart\Listeners;

use App\Containers\MarketPalace\Cart\Facades\Cart;
use App\Ship\Parents\Listeners\Listener as ParentListener;

class AssignUserToCart extends ParentListener
{
    /**
     * Assign a user to the cart
     *
     * @param $event
     */
    public function handle($event)
    {
        if (config('marketPalace.cart.auto_assign_user')) {
            if (Cart::getUser() && Cart::getUser()->id == $event->user->id) {
                return; // Don't associate to the same user again
            }
            Cart::setUser($event->user);
        }
    }
}
