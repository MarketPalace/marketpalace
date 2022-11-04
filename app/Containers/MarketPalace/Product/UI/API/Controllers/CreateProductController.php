<?php

namespace App\Containers\MarketPalace\Product\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Product\Actions\CreateProductAction;
use App\Containers\MarketPalace\Product\UI\API\Requests\CreateProductRequest;
use App\Containers\MarketPalace\Product\UI\API\Transformers\ProductTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateProductController extends ApiController
{
    /**
     * @param CreateProductRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createProduct(CreateProductRequest $request): JsonResponse
    {
        $product = app(CreateProductAction::class)->run($request);

        return $this->created($this->transform($product, ProductTransformer::class));
    }
}
