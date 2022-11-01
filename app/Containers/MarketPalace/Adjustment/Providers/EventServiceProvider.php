<?php

namespace App\Containers\MarketPalace\Adjustment\Providers;

use App\Ship\Parents\Providers\EventServiceProvider as ParentEventServiceProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class EventServiceProvider extends ParentEventServiceProvider
{
    /**
     * The event listener mappings for the container.
     *
     * @var array
     */
    protected $listen = [
        // OrderShipped::class => [
        //     SendShipmentNotification::class,
        // ],
    ];
}
