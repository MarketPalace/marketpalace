<?php

namespace App\Containers\MarketPalace\Product\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Product\Actions\UpdateProductAction;
use App\Containers\MarketPalace\Product\UI\API\Requests\UpdateProductRequest;
use App\Containers\MarketPalace\Product\UI\API\Transformers\ProductTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateProductController extends ApiController
{
    /**
     * @param UpdateProductRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateProduct(UpdateProductRequest $request): array
    {
        $product = app(UpdateProductAction::class)->run($request);

        return $this->transform($product, ProductTransformer::class);
    }
}
