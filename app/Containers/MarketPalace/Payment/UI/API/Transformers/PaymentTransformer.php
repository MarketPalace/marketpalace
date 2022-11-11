<?php

namespace App\Containers\MarketPalace\Payment\UI\API\Transformers;

use App\Containers\MarketPalace\Payment\Models\Payment;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class PaymentTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Payment $payment): array
    {
        $response = [
            'object' => $payment->getResourceKey(),
            'id' => $payment->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $payment->id,
            'created_at' => $payment->created_at,
            'updated_at' => $payment->updated_at,
            'readable_created_at' => $payment->created_at->diffForHumans(),
            'readable_updated_at' => $payment->updated_at->diffForHumans(),
            // 'deleted_at' => $payment->deleted_at,
        ], $response);
    }
}
