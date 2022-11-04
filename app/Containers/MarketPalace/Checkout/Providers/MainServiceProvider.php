<?php

namespace App\Containers\MarketPalace\Checkout\Providers;

use App\Containers\MarketPalace\Checkout\CheckoutManager;
use App\Containers\MarketPalace\Checkout\Contracts\Checkout as CheckoutContract;
use App\Containers\MarketPalace\Checkout\Contracts\CheckoutDataFactory;
use App\Containers\MarketPalace\Checkout\Contracts\CheckoutStore;
use App\Containers\MarketPalace\Checkout\Enums\CheckoutState;
use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;
use Illuminate\Support\Str;

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

    protected array $enums = [
        CheckoutState::class
    ];

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();

        $this->app->bind(CheckoutContract::class, CheckoutManager::class);
        $this->app->singleton('marketpalace.checkout', function ($app) {
            return $app->make(CheckoutContract::class);
        });


        $this->app->bind(CheckoutStore::class, function ($app) {
            $driverClass = $app['config']->get('marketPalace.checkout.store.driver');
            if (!str_contains($driverClass, '\\')) {
                $driverClass = sprintf(
                    '\\App\\Containers\\MarketPalace\\Checkout\\Drivers\\%sStore',
                    Str::studly($driverClass)
                );
            }

            return new $driverClass(
                $app['config']->get('marketPalace.checkout.store'),
                $app->make(CheckoutDataFactory::class)
            );
        });
    }
}
