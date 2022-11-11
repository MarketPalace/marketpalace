<?php

namespace App\Containers\MarketPalace\Property\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Property\Actions\CreatePropertyAction;
use App\Containers\MarketPalace\Property\UI\API\Requests\CreatePropertyRequest;
use App\Containers\MarketPalace\Property\UI\API\Transformers\PropertyTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreatePropertyController extends ApiController
{
    /**
     * @param CreatePropertyRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createProperty(CreatePropertyRequest $request): JsonResponse
    {
        $property = app(CreatePropertyAction::class)->run($request);

        return $this->created($this->transform($property, PropertyTransformer::class));
    }
}
