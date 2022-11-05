<?php

namespace App\Containers\MarketPalace\MasterProduct\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\MasterProduct\Actions\GetAllMasterProductsAction;
use App\Containers\MarketPalace\MasterProduct\UI\API\Requests\GetAllMasterProductsRequest;
use App\Containers\MarketPalace\MasterProduct\UI\API\Transformers\MasterProductTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllMasterProductsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllMasterProducts(GetAllMasterProductsRequest $request): array
    {
        $masterproducts = app(GetAllMasterProductsAction::class)->run($request);

        return $this->transform($masterproducts, MasterProductTransformer::class);
    }
}
