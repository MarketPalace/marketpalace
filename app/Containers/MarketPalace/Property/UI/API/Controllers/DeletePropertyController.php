<?php

namespace App\Containers\MarketPalace\Property\UI\API\Controllers;

use App\Containers\MarketPalace\Property\Actions\DeletePropertyAction;
use App\Containers\MarketPalace\Property\UI\API\Requests\DeletePropertyRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeletePropertyController extends ApiController
{
    /**
     * @param DeletePropertyRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteProperty(DeletePropertyRequest $request): JsonResponse
    {
        app(DeletePropertyAction::class)->run($request);

        return $this->noContent();
    }
}
