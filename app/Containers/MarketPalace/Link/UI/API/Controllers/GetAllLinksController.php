<?php

namespace App\Containers\MarketPalace\Link\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Link\Actions\GetAllLinksAction;
use App\Containers\MarketPalace\Link\UI\API\Requests\GetAllLinksRequest;
use App\Containers\MarketPalace\Link\UI\API\Transformers\LinkTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllLinksController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllLinks(GetAllLinksRequest $request): array
    {
        $links = app(GetAllLinksAction::class)->run($request);

        return $this->transform($links, LinkTransformer::class);
    }
}
