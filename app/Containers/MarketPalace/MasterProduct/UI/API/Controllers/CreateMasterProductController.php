<?php

namespace App\Containers\MarketPalace\MasterProduct\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\MasterProduct\Actions\CreateMasterProductAction;
use App\Containers\MarketPalace\MasterProduct\UI\API\Requests\CreateMasterProductRequest;
use App\Containers\MarketPalace\MasterProduct\UI\API\Transformers\MasterProductTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateMasterProductController extends ApiController
{
    /**
     * @param CreateMasterProductRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createMasterProduct(CreateMasterProductRequest $request): JsonResponse
    {
        $masterproduct = app(CreateMasterProductAction::class)->run($request);

        return $this->created($this->transform($masterproduct, MasterProductTransformer::class));
    }
}
