<?php

namespace App\Containers\MarketPalace\Link\Providers;

use App\Containers\MarketPalace\Link\Models\LinkGroup;
use App\Containers\MarketPalace\Link\Models\LinkGroupItem;
use App\Containers\MarketPalace\Link\Models\LinkType;
use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
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

    protected array $models = [
        LinkType::class,
        LinkGroup::class,
        LinkGroupItem::class,
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
