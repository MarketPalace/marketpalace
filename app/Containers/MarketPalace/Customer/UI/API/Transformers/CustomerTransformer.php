<?php

namespace App\Containers\MarketPalace\Customer\UI\API\Transformers;

use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CustomerTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Customer $customer): array
    {
        $response = [
            'object' => $customer->getResourceKey(),
            'id' => $customer->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $customer->id,
            'created_at' => $customer->created_at,
            'updated_at' => $customer->updated_at,
            'readable_created_at' => $customer->created_at->diffForHumans(),
            'readable_updated_at' => $customer->updated_at->diffForHumans(),
            // 'deleted_at' => $customer->deleted_at,
        ], $response);
    }
}
