<?php

namespace App\Containers\MarketPalace\Channel\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Channel\Actions\UpdateChannelAction;
use App\Containers\MarketPalace\Channel\UI\API\Requests\UpdateChannelRequest;
use App\Containers\MarketPalace\Channel\UI\API\Transformers\ChannelTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateChannelController extends ApiController
{
    /**
     * @param UpdateChannelRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateChannel(UpdateChannelRequest $request): array
    {
        $channel = app(UpdateChannelAction::class)->run($request);

        return $this->transform($channel, ChannelTransformer::class);
    }
}
