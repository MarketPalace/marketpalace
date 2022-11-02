<?php

namespace App\Containers\MarketPalace\Channel\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Channel\Actions\CreateChannelAction;
use App\Containers\MarketPalace\Channel\UI\API\Requests\CreateChannelRequest;
use App\Containers\MarketPalace\Channel\UI\API\Transformers\ChannelTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateChannelController extends ApiController
{
    /**
     * @param CreateChannelRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createChannel(CreateChannelRequest $request): JsonResponse
    {
        $channel = app(CreateChannelAction::class)->run($request);

        return $this->created($this->transform($channel, ChannelTransformer::class));
    }
}
