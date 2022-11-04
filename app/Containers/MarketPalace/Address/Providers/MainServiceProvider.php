<?php

namespace App\Containers\MarketPalace\Address\Providers;

use App\Containers\MarketPalace\Address\Enums\AddressType;
use App\Containers\MarketPalace\Address\Enums\Gender;
use App\Containers\MarketPalace\Address\Enums\NameOrder;
use App\Containers\MarketPalace\Address\Enums\ProvinceType;
use App\Containers\MarketPalace\Address\Models\Person;
use App\Containers\MarketPalace\Address\Models\Address;
use App\Containers\MarketPalace\Address\Models\Country;
use App\Containers\MarketPalace\Address\Models\Organization;
use App\Containers\MarketPalace\Address\Models\Province;
use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    protected array $models = [
        Address::class,
        Country::class,
        Organization::class,
        Person::class,
        Province::class
    ];

    protected array $enums = [
        AddressType::class,
        Gender::class,
        NameOrder::class,
        ProvinceType::class
    ];

    /**
     * Container Service Providers.
     */
    public array $serviceProviders = [
        // InternalServiceProviderExample::class,
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [
        // 'Foo' => Bar::class,
    ];

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();

        // $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        // ...
    }
}
