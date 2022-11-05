<?php

namespace App\Containers\MarketPalace\MasterProduct\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\MasterProduct\Models\MasterProduct;
use App\Containers\MarketPalace\MasterProduct\Tasks\UpdateMasterProductTask;
use App\Containers\MarketPalace\MasterProduct\UI\API\Requests\UpdateMasterProductRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateMasterProductAction extends ParentAction
{
    /**
     * @param UpdateMasterProductRequest $request
     * @return MasterProduct
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateMasterProductRequest $request): MasterProduct
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateMasterProductTask::class)->run($data, $request->id);
    }
}
