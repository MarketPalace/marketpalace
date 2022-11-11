<?php

namespace App\Containers\MarketPalace\Property\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Property\Tasks\GetAllPropertiesTask;
use App\Containers\MarketPalace\Property\UI\API\Requests\GetAllPropertiesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllPropertiesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllPropertiesRequest $request): mixed
    {
        return app(GetAllPropertiesTask::class)->run();
    }
}
