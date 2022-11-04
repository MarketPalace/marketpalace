<?php

namespace App\Containers\MarketPalace\Link\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Link\Actions\UpdateLinkAction;
use App\Containers\MarketPalace\Link\UI\API\Requests\UpdateLinkRequest;
use App\Containers\MarketPalace\Link\UI\API\Transformers\LinkTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateLinkController extends ApiController
{
    /**
     * @param UpdateLinkRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateLink(UpdateLinkRequest $request): array
    {
        $link = app(UpdateLinkAction::class)->run($request);

        return $this->transform($link, LinkTransformer::class);
    }
}
