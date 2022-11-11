<?php

namespace App\Containers\MarketPalace\Shipment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Shipment\Actions\CreateShipmentAction;
use App\Containers\MarketPalace\Shipment\UI\API\Requests\CreateShipmentRequest;
use App\Containers\MarketPalace\Shipment\UI\API\Transformers\ShipmentTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateShipmentController extends ApiController
{
    /**
     * @param CreateShipmentRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createShipment(CreateShipmentRequest $request): JsonResponse
    {
        $shipment = app(CreateShipmentAction::class)->run($request);

        return $this->created($this->transform($shipment, ShipmentTransformer::class));
    }
}
