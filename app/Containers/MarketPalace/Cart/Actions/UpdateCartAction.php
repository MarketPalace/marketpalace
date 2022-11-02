<?php

namespace App\Containers\MarketPalace\Cart\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Cart\Models\Cart;
use App\Containers\MarketPalace\Cart\Tasks\UpdateCartTask;
use App\Containers\MarketPalace\Cart\UI\API\Requests\UpdateCartRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCartAction extends ParentAction
{
    /**
     * @param UpdateCartRequest $request
     * @return Cart
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCartRequest $request): Cart
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateCartTask::class)->run($data, $request->id);
    }
}
