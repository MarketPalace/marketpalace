<?php

namespace App\Containers\MarketPalace\Shipment\Actions;

use App\Containers\MarketPalace\Shipment\Tasks\DeleteShipmentTask;
use App\Containers\MarketPalace\Shipment\UI\API\Requests\DeleteShipmentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteShipmentAction extends ParentAction
{
    /**
     * @param DeleteShipmentRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteShipmentRequest $request): int
    {
        return app(DeleteShipmentTask::class)->run($request->id);
    }
}
