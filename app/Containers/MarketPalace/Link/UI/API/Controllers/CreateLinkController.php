<?php

namespace App\Containers\MarketPalace\Link\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Link\Actions\CreateLinkAction;
use App\Containers\MarketPalace\Link\UI\API\Requests\CreateLinkRequest;
use App\Containers\MarketPalace\Link\UI\API\Transformers\LinkTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateLinkController extends ApiController
{
    /**
     * @param CreateLinkRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createLink(CreateLinkRequest $request): JsonResponse
    {
        $link = app(CreateLinkAction::class)->run($request);

        return $this->created($this->transform($link, LinkTransformer::class));
    }
}
