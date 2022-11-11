<?php

namespace App\Containers\MarketPalace\Shipment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Shipment\Models\Shipment;
use App\Containers\MarketPalace\Shipment\Tasks\UpdateShipmentTask;
use App\Containers\MarketPalace\Shipment\UI\API\Requests\UpdateShipmentRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateShipmentAction extends ParentAction
{
    /**
     * @param UpdateShipmentRequest $request
     * @return Shipment
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateShipmentRequest $request): Shipment
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateShipmentTask::class)->run($data, $request->id);
    }
}
