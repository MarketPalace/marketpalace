<?php

declare(strict_types=1);

/**
 * Contains the RestoreCurrentUsersLastActiveCart class.
 *
 * @copyright   Copyright (c) 2018 Conrad Hellmann
 * @author      Conrad Hellmann
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Cart\Listeners;

use Illuminate\Support\Facades\Auth;
use App\Containers\MarketPalace\Cart\Facades\Cart;
use App\Ship\Parents\Listeners\Listener as ParentListener;

class RestoreCurrentUsersLastActiveCart extends ParentListener
{
    public function handle($event)
    {
        if (config('marketPalace.cart.preserve_for_user') && Auth::check()) {
            if (Cart::isEmpty()) {
                Cart::restoreLastActiveCart(Auth::user());
            } elseif (config('marketPalace.cart.merge_duplicates')) {
                Cart::mergeLastActiveCartWithSessionCart(Auth::user());
            }
        }
    }
}
