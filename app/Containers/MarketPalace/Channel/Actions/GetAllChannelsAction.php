<?php

namespace App\Containers\MarketPalace\Channel\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Channel\Tasks\GetAllChannelsTask;
use App\Containers\MarketPalace\Channel\UI\API\Requests\GetAllChannelsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllChannelsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllChannelsRequest $request): mixed
    {
        return app(GetAllChannelsTask::class)->run();
    }
}
