<?php

namespace App\Containers\MarketPalace\MasterProduct\Data\Factories;

use App\Containers\MarketPalace\MasterProduct\Models\MasterProduct;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class MasterProductFactory extends ParentFactory
{
    protected $model = MasterProduct::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
