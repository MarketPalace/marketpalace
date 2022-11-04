<?php

namespace App\Containers\MarketPalace\Link\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Link\Actions\FindLinkByIdAction;
use App\Containers\MarketPalace\Link\UI\API\Requests\FindLinkByIdRequest;
use App\Containers\MarketPalace\Link\UI\API\Transformers\LinkTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindLinkByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findLinkById(FindLinkByIdRequest $request): array
    {
        $link = app(FindLinkByIdAction::class)->run($request);

        return $this->transform($link, LinkTransformer::class);
    }
}
