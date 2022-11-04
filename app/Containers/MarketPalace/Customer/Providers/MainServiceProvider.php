<?php

namespace App\Containers\MarketPalace\Customer\Providers;

use App\Containers\MarketPalace\Customer\Enums\CustomerType;
use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    protected array $models = [
        Customer::class
    ];
    protected array $enums = [
        CustomerType::class
    ];
}
