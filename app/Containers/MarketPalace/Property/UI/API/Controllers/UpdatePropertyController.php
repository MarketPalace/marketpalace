<?php

namespace App\Containers\MarketPalace\Property\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Property\Actions\UpdatePropertyAction;
use App\Containers\MarketPalace\Property\UI\API\Requests\UpdatePropertyRequest;
use App\Containers\MarketPalace\Property\UI\API\Transformers\PropertyTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdatePropertyController extends ApiController
{
    /**
     * @param UpdatePropertyRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateProperty(UpdatePropertyRequest $request): array
    {
        $property = app(UpdatePropertyAction::class)->run($request);

        return $this->transform($property, PropertyTransformer::class);
    }
}
