<?php

namespace App\Containers\MarketPalace\Payment\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Payment\Tasks\GetAllPaymentsTask;
use App\Containers\MarketPalace\Payment\UI\API\Requests\GetAllPaymentsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllPaymentsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllPaymentsRequest $request): mixed
    {
        return app(GetAllPaymentsTask::class)->run();
    }
}
