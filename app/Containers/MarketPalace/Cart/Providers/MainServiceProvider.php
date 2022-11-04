<?php

namespace App\Containers\MarketPalace\Cart\Providers;

use App\Containers\MarketPalace\Cart\Enums\CartState;
use App\Containers\MarketPalace\Cart\Models\Cart;
use App\Containers\MarketPalace\Cart\Facades\Cart as CartFacades;
use App\Containers\MarketPalace\Cart\Models\CartItem;
use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;
use App\Containers\MarketPalace\Cart\CartManager;
use App\Containers\MarketPalace\Cart\Contracts\CartManager as CartManagerContract;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    protected array $models = [
        Cart::class,
        CartItem::class
    ];

    protected array $enums = [
        CartState::class
    ];

    /**
     * Container Service Providers.
     */
    public array $serviceProviders = [
        EventServiceProvider::class,
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [
        'Cart' => CartFacades::class,
    ];

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();

        $this->app->bind(CartManagerContract::class, CartManager::class);

        $this->app->singleton('marketpalace.cart', function ($app) {
            return $app->make(CartManagerContract::class);
        });
    }
}
