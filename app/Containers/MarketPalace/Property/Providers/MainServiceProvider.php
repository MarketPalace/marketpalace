<?php

namespace App\Containers\MarketPalace\Property\Providers;

use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;
use App\Containers\MarketPalace\Property\Models\Property;
use App\Containers\MarketPalace\Property\Models\PropertyValue;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    protected array $models = [
        Property::class,
        PropertyValue::class
    ];
}
