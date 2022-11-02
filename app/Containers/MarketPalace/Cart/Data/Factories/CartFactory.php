<?php

namespace App\Containers\MarketPalace\Cart\Data\Factories;

use App\Containers\MarketPalace\Cart\Models\Cart;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class CartFactory extends ParentFactory
{
    protected $model = Cart::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
