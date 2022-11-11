<?php

namespace App\Containers\MarketPalace\Shipment\UI\API\Controllers;

use App\Containers\MarketPalace\Shipment\Actions\DeleteShipmentAction;
use App\Containers\MarketPalace\Shipment\UI\API\Requests\DeleteShipmentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteShipmentController extends ApiController
{
    /**
     * @param DeleteShipmentRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteShipment(DeleteShipmentRequest $request): JsonResponse
    {
        app(DeleteShipmentAction::class)->run($request);

        return $this->noContent();
    }
}
