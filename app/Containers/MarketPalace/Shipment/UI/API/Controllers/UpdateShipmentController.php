<?php

namespace App\Containers\MarketPalace\Shipment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Shipment\Actions\UpdateShipmentAction;
use App\Containers\MarketPalace\Shipment\UI\API\Requests\UpdateShipmentRequest;
use App\Containers\MarketPalace\Shipment\UI\API\Transformers\ShipmentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateShipmentController extends ApiController
{
    /**
     * @param UpdateShipmentRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateShipment(UpdateShipmentRequest $request): array
    {
        $shipment = app(UpdateShipmentAction::class)->run($request);

        return $this->transform($shipment, ShipmentTransformer::class);
    }
}
