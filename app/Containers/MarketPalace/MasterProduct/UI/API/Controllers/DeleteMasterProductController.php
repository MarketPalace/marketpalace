<?php

namespace App\Containers\MarketPalace\MasterProduct\UI\API\Controllers;

use App\Containers\MarketPalace\MasterProduct\Actions\DeleteMasterProductAction;
use App\Containers\MarketPalace\MasterProduct\UI\API\Requests\DeleteMasterProductRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteMasterProductController extends ApiController
{
    /**
     * @param DeleteMasterProductRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteMasterProduct(DeleteMasterProductRequest $request): JsonResponse
    {
        app(DeleteMasterProductAction::class)->run($request);

        return $this->noContent();
    }
}
