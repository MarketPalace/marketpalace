<?php

namespace App\Containers\MarketPalace\MasterProduct\Providers;

use App\Containers\MarketPalace\MasterProduct\Models\MasterProduct;
use App\Containers\MarketPalace\MasterProduct\Models\MasterProductVariant;
use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    protected array $models = [
        MasterProduct::class,
        MasterProductVariant::class,
    ];
}
