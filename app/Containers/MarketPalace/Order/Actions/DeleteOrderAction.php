<?php

namespace App\Containers\MarketPalace\Order\Actions;

use App\Containers\MarketPalace\Order\Tasks\DeleteOrderTask;
use App\Containers\MarketPalace\Order\UI\API\Requests\DeleteOrderRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteOrderAction extends ParentAction
{
    /**
     * @param DeleteOrderRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteOrderRequest $request): int
    {
        return app(DeleteOrderTask::class)->run($request->id);
    }
}
