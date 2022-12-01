<?php

namespace App\Containers\MarketPalace\User\Providers;

use App\Containers\MarketPalace\User\Enums\UserType;
use App\Containers\MarketPalace\User\Models\Invitation;
use App\Containers\MarketPalace\User\Models\Profile;
use App\Containers\MarketPalace\User\Models\User;
use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    /** @var array */
    protected array $models = [
        User::class,
        Profile::class,
        Invitation::class,
    ];

    /** @var array */
    protected array $enums = [
        UserType::class
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
