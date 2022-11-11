<?php

namespace App\Containers\MarketPalace\Shipment\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Shipment\Tasks\GetAllShipmentsTask;
use App\Containers\MarketPalace\Shipment\UI\API\Requests\GetAllShipmentsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllShipmentsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllShipmentsRequest $request): mixed
    {
        return app(GetAllShipmentsTask::class)->run();
    }
}
