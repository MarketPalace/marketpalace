<?php

namespace App\Containers\MarketPalace\Product\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Product\Actions\FindProductByIdAction;
use App\Containers\MarketPalace\Product\UI\API\Requests\FindProductByIdRequest;
use App\Containers\MarketPalace\Product\UI\API\Transformers\ProductTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindProductByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findProductById(FindProductByIdRequest $request): array
    {
        $product = app(FindProductByIdAction::class)->run($request);

        return $this->transform($product, ProductTransformer::class);
    }
}
