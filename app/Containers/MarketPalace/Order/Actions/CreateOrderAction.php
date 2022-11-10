<?php

namespace App\Containers\MarketPalace\Order\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Order\Models\Order;
use App\Containers\MarketPalace\Order\Tasks\CreateOrderTask;
use App\Containers\MarketPalace\Order\UI\API\Requests\CreateOrderRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateOrderAction extends ParentAction
{
    /**
     * @param CreateOrderRequest $request
     * @return Order
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateOrderRequest $request): Order
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateOrderTask::class)->run($data);
    }
}
