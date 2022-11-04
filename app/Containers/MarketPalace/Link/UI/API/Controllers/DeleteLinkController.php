<?php

namespace App\Containers\MarketPalace\Link\UI\API\Controllers;

use App\Containers\MarketPalace\Link\Actions\DeleteLinkAction;
use App\Containers\MarketPalace\Link\UI\API\Requests\DeleteLinkRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteLinkController extends ApiController
{
    /**
     * @param DeleteLinkRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteLink(DeleteLinkRequest $request): JsonResponse
    {
        app(DeleteLinkAction::class)->run($request);

        return $this->noContent();
    }
}
