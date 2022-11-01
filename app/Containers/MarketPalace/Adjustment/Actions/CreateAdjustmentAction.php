<?php

namespace App\Containers\MarketPalace\Adjustment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Adjustment\Models\Adjustment;
use App\Containers\MarketPalace\Adjustment\Tasks\CreateAdjustmentTask;
use App\Containers\MarketPalace\Adjustment\UI\API\Requests\CreateAdjustmentRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateAdjustmentAction extends ParentAction
{
    /**
     * @param CreateAdjustmentRequest $request
     * @return Adjustment
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateAdjustmentRequest $request): Adjustment
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateAdjustmentTask::class)->run($data);
    }
}
