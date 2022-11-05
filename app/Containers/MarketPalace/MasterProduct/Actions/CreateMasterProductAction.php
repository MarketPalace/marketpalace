<?php

namespace App\Containers\MarketPalace\MasterProduct\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\MasterProduct\Models\MasterProduct;
use App\Containers\MarketPalace\MasterProduct\Tasks\CreateMasterProductTask;
use App\Containers\MarketPalace\MasterProduct\UI\API\Requests\CreateMasterProductRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateMasterProductAction extends ParentAction
{
    /**
     * @param CreateMasterProductRequest $request
     * @return MasterProduct
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateMasterProductRequest $request): MasterProduct
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateMasterProductTask::class)->run($data);
    }
}
