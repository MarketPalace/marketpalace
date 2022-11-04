<?php

namespace App\Containers\MarketPalace\Link\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Link\Tasks\GetAllLinksTask;
use App\Containers\MarketPalace\Link\UI\API\Requests\GetAllLinksRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllLinksAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllLinksRequest $request): mixed
    {
        return app(GetAllLinksTask::class)->run();
    }
}
