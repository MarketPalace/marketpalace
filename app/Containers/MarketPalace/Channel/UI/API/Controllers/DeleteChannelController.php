<?php

namespace App\Containers\MarketPalace\Channel\UI\API\Controllers;

use App\Containers\MarketPalace\Channel\Actions\DeleteChannelAction;
use App\Containers\MarketPalace\Channel\UI\API\Requests\DeleteChannelRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteChannelController extends ApiController
{
    /**
     * @param DeleteChannelRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteChannel(DeleteChannelRequest $request): JsonResponse
    {
        app(DeleteChannelAction::class)->run($request);

        return $this->noContent();
    }
}
