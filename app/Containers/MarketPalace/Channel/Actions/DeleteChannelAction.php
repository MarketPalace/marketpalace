<?php

namespace App\Containers\MarketPalace\Channel\Actions;

use App\Containers\MarketPalace\Channel\Tasks\DeleteChannelTask;
use App\Containers\MarketPalace\Channel\UI\API\Requests\DeleteChannelRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteChannelAction extends ParentAction
{
    /**
     * @param DeleteChannelRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteChannelRequest $request): int
    {
        return app(DeleteChannelTask::class)->run($request->id);
    }
}
