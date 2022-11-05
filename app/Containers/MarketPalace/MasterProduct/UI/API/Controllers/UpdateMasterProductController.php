<?php

namespace App\Containers\MarketPalace\MasterProduct\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\MasterProduct\Actions\UpdateMasterProductAction;
use App\Containers\MarketPalace\MasterProduct\UI\API\Requests\UpdateMasterProductRequest;
use App\Containers\MarketPalace\MasterProduct\UI\API\Transformers\MasterProductTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateMasterProductController extends ApiController
{
    /**
     * @param UpdateMasterProductRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateMasterProduct(UpdateMasterProductRequest $request): array
    {
        $masterproduct = app(UpdateMasterProductAction::class)->run($request);

        return $this->transform($masterproduct, MasterProductTransformer::class);
    }
}
