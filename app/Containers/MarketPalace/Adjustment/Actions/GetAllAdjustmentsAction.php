<?php

namespace App\Containers\MarketPalace\Adjustment\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Adjustment\Tasks\GetAllAdjustmentsTask;
use App\Containers\MarketPalace\Adjustment\UI\API\Requests\GetAllAdjustmentsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllAdjustmentsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllAdjustmentsRequest $request): mixed
    {
        return app(GetAllAdjustmentsTask::class)->run();
    }
}
