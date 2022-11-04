<?php

namespace App\Containers\MarketPalace\Adjustment\Providers;

use App\Containers\MarketPalace\Adjustment\Enums\AdjustmentType;
use App\Containers\MarketPalace\Adjustment\Models\Adjustment;
use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    protected array $models = [
        Adjustment::class
    ];

    protected array $enums = [
        AdjustmentType::class
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
