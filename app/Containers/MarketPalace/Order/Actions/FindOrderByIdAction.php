<?php

namespace App\Containers\MarketPalace\Order\Actions;

use App\Containers\MarketPalace\Order\Models\Order;
use App\Containers\MarketPalace\Order\Tasks\FindOrderByIdTask;
use App\Containers\MarketPalace\Order\UI\API\Requests\FindOrderByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindOrderByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindOrderByIdRequest $request): Order
    {
        return app(FindOrderByIdTask::class)->run($request->id);
    }
}
