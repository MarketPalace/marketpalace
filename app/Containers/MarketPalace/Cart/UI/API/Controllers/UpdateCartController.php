<?php

namespace App\Containers\MarketPalace\Cart\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Cart\Actions\UpdateCartAction;
use App\Containers\MarketPalace\Cart\UI\API\Requests\UpdateCartRequest;
use App\Containers\MarketPalace\Cart\UI\API\Transformers\CartTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateCartController extends ApiController
{
    /**
     * @param UpdateCartRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateCart(UpdateCartRequest $request): array
    {
        $cart = app(UpdateCartAction::class)->run($request);

        return $this->transform($cart, CartTransformer::class);
    }
}
