<?php

namespace App\Containers\MarketPalace\Product\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Product\Models\Product;
use App\Containers\MarketPalace\Product\Tasks\UpdateProductTask;
use App\Containers\MarketPalace\Product\UI\API\Requests\UpdateProductRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateProductAction extends ParentAction
{
    /**
     * @param UpdateProductRequest $request
     * @return Product
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateProductRequest $request): Product
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateProductTask::class)->run($data, $request->id);
    }
}
