<?php

namespace App\Containers\MarketPalace\Channel\Data\Factories;

use App\Containers\MarketPalace\Channel\Models\Channel;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ChannelFactory extends ParentFactory
{
    protected $model = Channel::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
