<?php

namespace App\Containers\AppSection\User\Providers;

use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;
use App\Containers\AppSection\User\Models\Invitation;
use App\Containers\AppSection\User\Models\Profile;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Enums\UserType;

/**
 * Class MainServiceProvider.
 *
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
        // ...
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [

    ];

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();

        // do your binding here..
        // $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
