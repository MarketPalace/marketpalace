<?php

namespace App\Containers\MarketPalace\Property\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Property\Actions\GetAllPropertiesAction;
use App\Containers\MarketPalace\Property\UI\API\Requests\GetAllPropertiesRequest;
use App\Containers\MarketPalace\Property\UI\API\Transformers\PropertyTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllPropertiesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllProperties(GetAllPropertiesRequest $request): array
    {
        $properties = app(GetAllPropertiesAction::class)->run($request);

        return $this->transform($properties, PropertyTransformer::class);
    }
}
