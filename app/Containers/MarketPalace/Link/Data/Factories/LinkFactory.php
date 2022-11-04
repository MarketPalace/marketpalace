<?php

namespace App\Containers\MarketPalace\Link\Data\Factories;

use App\Containers\MarketPalace\Link\Models\Link;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class LinkFactory extends ParentFactory
{
    protected $model = Link::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
