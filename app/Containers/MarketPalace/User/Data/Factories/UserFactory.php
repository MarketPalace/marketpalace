<?php

namespace App\Containers\MarketPalace\User\Data\Factories;

use App\Containers\MarketPalace\User\Models\User;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class UserFactory extends ParentFactory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
