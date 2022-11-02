<?php

namespace App\Containers\MarketPalace\Cart\Actions;

use App\Containers\MarketPalace\Cart\Tasks\DeleteCartTask;
use App\Containers\MarketPalace\Cart\UI\API\Requests\DeleteCartRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCartAction extends ParentAction
{
    /**
     * @param DeleteCartRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCartRequest $request): int
    {
        return app(DeleteCartTask::class)->run($request->id);
    }
}
