<?php

namespace App\Containers\MarketPalace\Adjustment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Adjustment\Models\Adjustment;
use App\Containers\MarketPalace\Adjustment\Tasks\UpdateAdjustmentTask;
use App\Containers\MarketPalace\Adjustment\UI\API\Requests\UpdateAdjustmentRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateAdjustmentAction extends ParentAction
{
    /**
     * @param UpdateAdjustmentRequest $request
     * @return Adjustment
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateAdjustmentRequest $request): Adjustment
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateAdjustmentTask::class)->run($data, $request->id);
    }
}
