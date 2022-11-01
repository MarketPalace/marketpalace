<?php

namespace App\Containers\MarketPalace\Adjustment\Actions;

use App\Containers\MarketPalace\Adjustment\Tasks\DeleteAdjustmentTask;
use App\Containers\MarketPalace\Adjustment\UI\API\Requests\DeleteAdjustmentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteAdjustmentAction extends ParentAction
{
    /**
     * @param DeleteAdjustmentRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteAdjustmentRequest $request): int
    {
        return app(DeleteAdjustmentTask::class)->run($request->id);
    }
}
