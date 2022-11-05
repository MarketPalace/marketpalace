<?php

namespace App\Containers\MarketPalace\MasterProduct\UI\API\Transformers;

use App\Containers\MarketPalace\MasterProduct\Models\MasterProduct;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class MasterProductTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(MasterProduct $masterproduct): array
    {
        $response = [
            'object' => $masterproduct->getResourceKey(),
            'id' => $masterproduct->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $masterproduct->id,
            'created_at' => $masterproduct->created_at,
            'updated_at' => $masterproduct->updated_at,
            'readable_created_at' => $masterproduct->created_at->diffForHumans(),
            'readable_updated_at' => $masterproduct->updated_at->diffForHumans(),
            // 'deleted_at' => $masterproduct->deleted_at,
        ], $response);
    }
}
