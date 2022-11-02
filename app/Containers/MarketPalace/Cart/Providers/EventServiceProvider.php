<?php

namespace App\Containers\MarketPalace\Cart\Providers;

use App\Containers\MarketPalace\Cart\Listeners\AssignUserToCart;
use App\Containers\MarketPalace\Cart\Listeners\DissociateUserFromCart;
use App\Containers\MarketPalace\Cart\Listeners\RestoreCurrentUsersLastActiveCart;
use App\Ship\Parents\Providers\EventServiceProvider as ParentEventServiceProvider;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class EventServiceProvider extends ParentEventServiceProvider
{
    /**
     * The event listener mappings for the container.
     *
     * @var array
     */
    protected $listen = [
        Login::class => [
            AssignUserToCart::class,
            RestoreCurrentUsersLastActiveCart::class,
        ],
        Authenticated::class => [
            AssignUserToCart::class,
            RestoreCurrentUsersLastActiveCart::class,
        ],
        Logout::class => [
            DissociateUserFromCart::class
        ],
        Lockout::class => [
            DissociateUserFromCart::class
        ]
    ];
}
