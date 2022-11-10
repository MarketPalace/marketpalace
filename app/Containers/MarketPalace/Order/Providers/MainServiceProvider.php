<?php

/**
 * Contains the BillPayer model class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Order\Providers;

use App\Containers\MarketPalace\Order\Contracts\OrderFactory as OrderFactoryContract;
use App\Containers\MarketPalace\Order\Contracts\OrderNumberGenerator;
use App\Containers\MarketPalace\Order\Enums\OrderStatus;
use App\Containers\MarketPalace\Order\Factories\OrderFactory;
use App\Containers\MarketPalace\Order\Models\BillPayer;
use App\Containers\MarketPalace\Order\Models\Order;
use App\Containers\MarketPalace\Order\Models\OrderItem;
use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;
use Illuminate\Support\Str;

class MainServiceProvider extends ParentMainServiceProvider
{
    protected array $models = [
        BillPayer::class,
        Order::class,
        OrderItem::class
    ];

    protected array $enums = [
        OrderStatus::class
    ];

    public function boot(): void
    {
        parent::boot();

        $this->registerOrderNumberGenerator();

        // Bind the default implementation to the interface
        $this->app->bind(OrderFactoryContract::class, OrderFactory::class);
    }

    protected function registerOrderNumberGenerator()
    {
        $generatorClass = $this->app['config']->get('marketPalace.order.number.generator', 'time_hash');

        $this->app->bind(OrderNumberGenerator::class, function ($app) use ($generatorClass) {
            if (!class_exists($generatorClass)) {
                $generatorClass = sprintf(
                    '\\App\\Containers\\MarketPalace\\Order\\Generators\\%sGenerator',
                    Str::studly($generatorClass)
                );
            }

            return $app->make($generatorClass);
        });
    }
}
