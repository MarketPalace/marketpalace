<?php

namespace App\Containers\MarketPalace\Order\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Order\Actions\UpdateOrderAction;
use App\Containers\MarketPalace\Order\UI\API\Requests\UpdateOrderRequest;
use App\Containers\MarketPalace\Order\UI\API\Transformers\OrderTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateOrderController extends ApiController
{
    /**
     * @param UpdateOrderRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateOrder(UpdateOrderRequest $request): array
    {
        $order = app(UpdateOrderAction::class)->run($request);

        return $this->transform($order, OrderTransformer::class);
    }
}
