<?php

namespace App\Containers\MarketPalace\Order\Data\Factories;

use App\Containers\MarketPalace\Order\Models\Order;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class OrderFactory extends ParentFactory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
