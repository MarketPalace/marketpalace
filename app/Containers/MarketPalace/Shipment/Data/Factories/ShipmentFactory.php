<?php

namespace App\Containers\MarketPalace\Shipment\Data\Factories;

use App\Containers\MarketPalace\Shipment\Models\Shipment;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ShipmentFactory extends ParentFactory
{
    protected $model = Shipment::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
