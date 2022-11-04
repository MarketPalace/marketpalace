<?php

namespace App\Containers\MarketPalace\Product\Data\Factories;

use App\Containers\MarketPalace\Product\Models\Product;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ProductFactory extends ParentFactory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
