<?php

namespace App\Containers\MarketPalace\Shipment\UI\API\Transformers;

use App\Containers\MarketPalace\Shipment\Models\Shipment;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ShipmentTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Shipment $shipment): array
    {
        $response = [
            'object' => $shipment->getResourceKey(),
            'id' => $shipment->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $shipment->id,
            'created_at' => $shipment->created_at,
            'updated_at' => $shipment->updated_at,
            'readable_created_at' => $shipment->created_at->diffForHumans(),
            'readable_updated_at' => $shipment->updated_at->diffForHumans(),
            // 'deleted_at' => $shipment->deleted_at,
        ], $response);
    }
}
