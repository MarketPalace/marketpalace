<?php

namespace App\Containers\MarketPalace\Shipment\Providers;

use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;
use App\Containers\MarketPalace\Shipment\Models\Carrier;
use App\Containers\MarketPalace\Shipment\Models\Shipment;
use App\Containers\MarketPalace\Shipment\Enums\ShipmentStatus;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    protected array $models = [
        Shipment::class,
        Carrier::class,
    ];

    protected array $enums = [
        ShipmentStatus::class,
    ];
}
