<?php

namespace App\Containers\MarketPalace\Shipment\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Shipment\Actions\GetAllShipmentsAction;
use App\Containers\MarketPalace\Shipment\UI\API\Requests\GetAllShipmentsRequest;
use App\Containers\MarketPalace\Shipment\UI\API\Transformers\ShipmentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllShipmentsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllShipments(GetAllShipmentsRequest $request): array
    {
        $shipments = app(GetAllShipmentsAction::class)->run($request);

        return $this->transform($shipments, ShipmentTransformer::class);
    }
}
