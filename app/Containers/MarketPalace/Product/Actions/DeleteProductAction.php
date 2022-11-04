<?php

namespace App\Containers\MarketPalace\Product\Actions;

use App\Containers\MarketPalace\Product\Tasks\DeleteProductTask;
use App\Containers\MarketPalace\Product\UI\API\Requests\DeleteProductRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteProductAction extends ParentAction
{
    /**
     * @param DeleteProductRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteProductRequest $request): int
    {
        return app(DeleteProductTask::class)->run($request->id);
    }
}
