<?php

namespace App\Containers\MarketPalace\Property\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Property\Actions\FindPropertyByIdAction;
use App\Containers\MarketPalace\Property\UI\API\Requests\FindPropertyByIdRequest;
use App\Containers\MarketPalace\Property\UI\API\Transformers\PropertyTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindPropertyByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findPropertyById(FindPropertyByIdRequest $request): array
    {
        $property = app(FindPropertyByIdAction::class)->run($request);

        return $this->transform($property, PropertyTransformer::class);
    }
}
