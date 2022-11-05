<?php

namespace App\Containers\MarketPalace\MasterProduct\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\MasterProduct\Tasks\GetAllMasterProductsTask;
use App\Containers\MarketPalace\MasterProduct\UI\API\Requests\GetAllMasterProductsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllMasterProductsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllMasterProductsRequest $request): mixed
    {
        return app(GetAllMasterProductsTask::class)->run();
    }
}
