<?php

namespace App\Containers\MarketPalace\Payment\Data\Factories;

use App\Containers\MarketPalace\Payment\Models\Payment;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class PaymentFactory extends ParentFactory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
