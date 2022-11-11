<?php

namespace App\Containers\MarketPalace\Property\Data\Factories;

use App\Containers\MarketPalace\Property\Models\Property;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class PropertyFactory extends ParentFactory
{
    protected $model = Property::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
