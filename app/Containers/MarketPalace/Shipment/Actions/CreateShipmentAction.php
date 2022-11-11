<?php

namespace App\Containers\MarketPalace\Shipment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Shipment\Models\Shipment;
use App\Containers\MarketPalace\Shipment\Tasks\CreateShipmentTask;
use App\Containers\MarketPalace\Shipment\UI\API\Requests\CreateShipmentRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateShipmentAction extends ParentAction
{
    /**
     * @param CreateShipmentRequest $request
     * @return Shipment
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateShipmentRequest $request): Shipment
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateShipmentTask::class)->run($data);
    }
}
