<?php

namespace App\Containers\MarketPalace\Address\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Address\Tasks\GetAllAddressesTask;
use App\Containers\MarketPalace\Address\UI\API\Requests\GetAllAddressesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllAddressesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllAddressesRequest $request): mixed
    {
        return app(GetAllAddressesTask::class)->run();
    }
}
