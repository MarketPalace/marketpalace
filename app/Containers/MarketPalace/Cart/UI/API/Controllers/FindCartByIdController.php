<?php

namespace App\Containers\MarketPalace\Cart\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Cart\Actions\FindCartByIdAction;
use App\Containers\MarketPalace\Cart\UI\API\Requests\FindCartByIdRequest;
use App\Containers\MarketPalace\Cart\UI\API\Transformers\CartTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindCartByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findCartById(FindCartByIdRequest $request): array
    {
        $cart = app(FindCartByIdAction::class)->run($request);

        return $this->transform($cart, CartTransformer::class);
    }
}
