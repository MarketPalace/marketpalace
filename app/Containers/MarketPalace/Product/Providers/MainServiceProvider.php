<?php

namespace App\Containers\MarketPalace\Product\Providers;

use App\Containers\MarketPalace\Product\Enums\ProductState;
use App\Containers\MarketPalace\Product\Models\Product;
use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    protected array $models = [
        Product::class
    ];

    protected array $enums = [
        ProductState::class
    ];
}
