<?php

namespace App\Containers\MarketPalace\Channel\UI\API\Transformers;

use App\Containers\MarketPalace\Channel\Models\Channel;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ChannelTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Channel $channel): array
    {
        $response = [
            'object' => $channel->getResourceKey(),
            'id' => $channel->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $channel->id,
            'created_at' => $channel->created_at,
            'updated_at' => $channel->updated_at,
            'readable_created_at' => $channel->created_at->diffForHumans(),
            'readable_updated_at' => $channel->updated_at->diffForHumans(),
            // 'deleted_at' => $channel->deleted_at,
        ], $response);
    }
}
