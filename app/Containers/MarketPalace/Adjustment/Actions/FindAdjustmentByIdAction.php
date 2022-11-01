<?php

namespace App\Containers\MarketPalace\Adjustment\Actions;

use App\Containers\MarketPalace\Adjustment\Models\Adjustment;
use App\Containers\MarketPalace\Adjustment\Tasks\FindAdjustmentByIdTask;
use App\Containers\MarketPalace\Adjustment\UI\API\Requests\FindAdjustmentByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindAdjustmentByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindAdjustmentByIdRequest $request): Adjustment
    {
        return app(FindAdjustmentByIdTask::class)->run($request->id);
    }
}
