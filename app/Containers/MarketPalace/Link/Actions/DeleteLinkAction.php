<?php

namespace App\Containers\MarketPalace\Link\Actions;

use App\Containers\MarketPalace\Link\Tasks\DeleteLinkTask;
use App\Containers\MarketPalace\Link\UI\API\Requests\DeleteLinkRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteLinkAction extends ParentAction
{
    /**
     * @param DeleteLinkRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteLinkRequest $request): int
    {
        return app(DeleteLinkTask::class)->run($request->id);
    }
}
