<?php

namespace App\Containers\MarketPalace\Order\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Order\Models\Order;
use App\Containers\MarketPalace\Order\Tasks\UpdateOrderTask;
use App\Containers\MarketPalace\Order\UI\API\Requests\UpdateOrderRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateOrderAction extends ParentAction
{
    /**
     * @param UpdateOrderRequest $request
     * @return Order
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateOrderRequest $request): Order
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateOrderTask::class)->run($data, $request->id);
    }
}
