<?php

namespace App\Containers\MarketPalace\Shipment\Actions;

use App\Containers\MarketPalace\Shipment\Models\Shipment;
use App\Containers\MarketPalace\Shipment\Tasks\FindShipmentByIdTask;
use App\Containers\MarketPalace\Shipment\UI\API\Requests\FindShipmentByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindShipmentByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindShipmentByIdRequest $request): Shipment
    {
        return app(FindShipmentByIdTask::class)->run($request->id);
    }
}
