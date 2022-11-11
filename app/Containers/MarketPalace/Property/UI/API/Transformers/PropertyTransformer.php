<?php

namespace App\Containers\MarketPalace\Property\UI\API\Transformers;

use App\Containers\MarketPalace\Property\Models\Property;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class PropertyTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Property $property): array
    {
        $response = [
            'object' => $property->getResourceKey(),
            'id' => $property->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $property->id,
            'created_at' => $property->created_at,
            'updated_at' => $property->updated_at,
            'readable_created_at' => $property->created_at->diffForHumans(),
            'readable_updated_at' => $property->updated_at->diffForHumans(),
            // 'deleted_at' => $property->deleted_at,
        ], $response);
    }
}
