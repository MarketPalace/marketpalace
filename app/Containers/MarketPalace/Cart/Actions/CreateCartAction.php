<?php

namespace App\Containers\MarketPalace\Cart\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Cart\Models\Cart;
use App\Containers\MarketPalace\Cart\Tasks\CreateCartTask;
use App\Containers\MarketPalace\Cart\UI\API\Requests\CreateCartRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCartAction extends ParentAction
{
    /**
     * @param CreateCartRequest $request
     * @return Cart
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCartRequest $request): Cart
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateCartTask::class)->run($data);
    }
}
