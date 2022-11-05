<?php

namespace App\Containers\MarketPalace\MasterProduct\Actions;

use App\Containers\MarketPalace\MasterProduct\Tasks\DeleteMasterProductTask;
use App\Containers\MarketPalace\MasterProduct\UI\API\Requests\DeleteMasterProductRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteMasterProductAction extends ParentAction
{
    /**
     * @param DeleteMasterProductRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteMasterProductRequest $request): int
    {
        return app(DeleteMasterProductTask::class)->run($request->id);
    }
}
