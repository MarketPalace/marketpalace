<?php

namespace App\Containers\MarketPalace\Link\UI\API\Transformers;

use App\Containers\MarketPalace\Link\Models\Link;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class LinkTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Link $link): array
    {
        $response = [
            'object' => $link->getResourceKey(),
            'id' => $link->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $link->id,
            'created_at' => $link->created_at,
            'updated_at' => $link->updated_at,
            'readable_created_at' => $link->created_at->diffForHumans(),
            'readable_updated_at' => $link->updated_at->diffForHumans(),
            // 'deleted_at' => $link->deleted_at,
        ], $response);
    }
}
