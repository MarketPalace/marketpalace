<?php

namespace App\Containers\MarketPalace\Cart\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Cart\Actions\GetAllCartsAction;
use App\Containers\MarketPalace\Cart\UI\API\Requests\GetAllCartsRequest;
use App\Containers\MarketPalace\Cart\UI\API\Transformers\CartTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCartsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCarts(GetAllCartsRequest $request): array
    {
        $carts = app(GetAllCartsAction::class)->run($request);

        return $this->transform($carts, CartTransformer::class);
    }
}
