<?php

namespace App\Containers\MarketPalace\Order\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Order\Actions\FindOrderByIdAction;
use App\Containers\MarketPalace\Order\UI\API\Requests\FindOrderByIdRequest;
use App\Containers\MarketPalace\Order\UI\API\Transformers\OrderTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindOrderByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findOrderById(FindOrderByIdRequest $request): array
    {
        $order = app(FindOrderByIdAction::class)->run($request);

        return $this->transform($order, OrderTransformer::class);
    }
}
