<?php

namespace App\Containers\MarketPalace\Order\UI\API\Controllers;

use App\Containers\MarketPalace\Order\Actions\DeleteOrderAction;
use App\Containers\MarketPalace\Order\UI\API\Requests\DeleteOrderRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteOrderController extends ApiController
{
    /**
     * @param DeleteOrderRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteOrder(DeleteOrderRequest $request): JsonResponse
    {
        app(DeleteOrderAction::class)->run($request);

        return $this->noContent();
    }
}
