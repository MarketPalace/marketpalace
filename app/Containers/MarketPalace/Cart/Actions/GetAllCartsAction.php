<?php

namespace App\Containers\MarketPalace\Cart\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Cart\Tasks\GetAllCartsTask;
use App\Containers\MarketPalace\Cart\UI\API\Requests\GetAllCartsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCartsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCartsRequest $request): mixed
    {
        return app(GetAllCartsTask::class)->run();
    }
}
