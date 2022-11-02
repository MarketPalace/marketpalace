<?php

declare(strict_types=1);

/**
 * Contains the DissociateUserFromCart listener class.
 *
 * @copyright   Copyright (c) 2018 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Cart\Listeners;

use App\Containers\MarketPalace\Cart\Facades\Cart;
use App\Ship\Parents\Listeners\Listener as ParentListener;

class DissociateUserFromCart extends ParentListener
{
    public function handle($event)
    {
        if (config('marketPalace.cart.auto_assign_user') && !config('marketPalace.cart.preserve_for_user')) {
            if (null !== Cart::getUser()) { // Prevent from surplus db operations
                Cart::removeUser();
            }
        }
    }
}
