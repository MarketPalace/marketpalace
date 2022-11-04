<?php

namespace App\Containers\MarketPalace\Product\UI\API\Transformers;

use App\Containers\MarketPalace\Product\Models\Product;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ProductTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Product $product): array
    {
        $response = [
            'object' => $product->getResourceKey(),
            'id' => $product->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $product->id,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
            'readable_created_at' => $product->created_at->diffForHumans(),
            'readable_updated_at' => $product->updated_at->diffForHumans(),
            // 'deleted_at' => $product->deleted_at,
        ], $response);
    }
}
