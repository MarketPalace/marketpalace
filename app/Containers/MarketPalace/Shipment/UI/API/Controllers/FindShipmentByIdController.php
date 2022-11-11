<?php

namespace App\Containers\MarketPalace\Shipment\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Shipment\Actions\FindShipmentByIdAction;
use App\Containers\MarketPalace\Shipment\UI\API\Requests\FindShipmentByIdRequest;
use App\Containers\MarketPalace\Shipment\UI\API\Transformers\ShipmentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindShipmentByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findShipmentById(FindShipmentByIdRequest $request): array
    {
        $shipment = app(FindShipmentByIdAction::class)->run($request);

        return $this->transform($shipment, ShipmentTransformer::class);
    }
}
