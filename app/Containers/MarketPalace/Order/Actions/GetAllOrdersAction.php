<?php

namespace App\Containers\MarketPalace\Order\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Order\Tasks\GetAllOrdersTask;
use App\Containers\MarketPalace\Order\UI\API\Requests\GetAllOrdersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllOrdersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllOrdersRequest $request): mixed
    {
        return app(GetAllOrdersTask::class)->run();
    }
}
