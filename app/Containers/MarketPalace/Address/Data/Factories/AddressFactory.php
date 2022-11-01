<?php

namespace App\Containers\MarketPalace\Address\Data\Factories;

use App\Containers\MarketPalace\Address\Models\Address;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class AddressFactory extends ParentFactory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
