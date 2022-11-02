<?php

namespace App\Containers\MarketPalace\Cart\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Cart\Actions\CreateCartAction;
use App\Containers\MarketPalace\Cart\UI\API\Requests\CreateCartRequest;
use App\Containers\MarketPalace\Cart\UI\API\Transformers\CartTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateCartController extends ApiController
{
    /**
     * @param CreateCartRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createCart(CreateCartRequest $request): JsonResponse
    {
        $cart = app(CreateCartAction::class)->run($request);

        return $this->created($this->transform($cart, CartTransformer::class));
    }
}
