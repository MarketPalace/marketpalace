<?php

namespace App\Containers\MarketPalace\MasterProduct\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\MasterProduct\Actions\FindMasterProductByIdAction;
use App\Containers\MarketPalace\MasterProduct\UI\API\Requests\FindMasterProductByIdRequest;
use App\Containers\MarketPalace\MasterProduct\UI\API\Transformers\MasterProductTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindMasterProductByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findMasterProductById(FindMasterProductByIdRequest $request): array
    {
        $masterproduct = app(FindMasterProductByIdAction::class)->run($request);

        return $this->transform($masterproduct, MasterProductTransformer::class);
    }
}
