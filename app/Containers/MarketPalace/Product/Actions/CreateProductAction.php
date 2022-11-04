<?php

namespace App\Containers\MarketPalace\Product\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Product\Models\Product;
use App\Containers\MarketPalace\Product\Tasks\CreateProductTask;
use App\Containers\MarketPalace\Product\UI\API\Requests\CreateProductRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateProductAction extends ParentAction
{
    /**
     * @param CreateProductRequest $request
     * @return Product
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateProductRequest $request): Product
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateProductTask::class)->run($data);
    }
}
