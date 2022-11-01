<?php

namespace App\Containers\MarketPalace\Adjustment\Data\Factories;

use App\Containers\MarketPalace\Adjustment\Models\Adjustment;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class AdjustmentFactory extends ParentFactory
{
    protected $model = Adjustment::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
