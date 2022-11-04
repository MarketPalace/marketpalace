<?php

namespace App\Containers\MarketPalace\Customer\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Customer\Tasks\GetAllCustomersTask;
use App\Containers\MarketPalace\Customer\UI\API\Requests\GetAllCustomersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCustomersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCustomersRequest $request): mixed
    {
        return app(GetAllCustomersTask::class)->run();
    }
}
