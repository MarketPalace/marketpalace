<?php

namespace App\Containers\MarketPalace\Cart\UI\API\Controllers;

use App\Containers\MarketPalace\Cart\Actions\DeleteCartAction;
use App\Containers\MarketPalace\Cart\UI\API\Requests\DeleteCartRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteCartController extends ApiController
{
    /**
     * @param DeleteCartRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteCart(DeleteCartRequest $request): JsonResponse
    {
        app(DeleteCartAction::class)->run($request);

        return $this->noContent();
    }
}
