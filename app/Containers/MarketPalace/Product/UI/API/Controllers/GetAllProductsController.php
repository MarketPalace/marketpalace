<?php

namespace App\Containers\MarketPalace\Product\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Product\Actions\GetAllProductsAction;
use App\Containers\MarketPalace\Product\UI\API\Requests\GetAllProductsRequest;
use App\Containers\MarketPalace\Product\UI\API\Transformers\ProductTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllProductsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllProducts(GetAllProductsRequest $request): array
    {
        $products = app(GetAllProductsAction::class)->run($request);

        return $this->transform($products, ProductTransformer::class);
    }
}
