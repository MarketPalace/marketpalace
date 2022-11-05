<?php

namespace App\Containers\MarketPalace\MasterProduct\Actions;

use App\Containers\MarketPalace\MasterProduct\Models\MasterProduct;
use App\Containers\MarketPalace\MasterProduct\Tasks\FindMasterProductByIdTask;
use App\Containers\MarketPalace\MasterProduct\UI\API\Requests\FindMasterProductByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindMasterProductByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindMasterProductByIdRequest $request): MasterProduct
    {
        return app(FindMasterProductByIdTask::class)->run($request->id);
    }
}
