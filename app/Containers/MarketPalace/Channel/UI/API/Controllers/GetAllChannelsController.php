<?php

namespace App\Containers\MarketPalace\Channel\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Channel\Actions\GetAllChannelsAction;
use App\Containers\MarketPalace\Channel\UI\API\Requests\GetAllChannelsRequest;
use App\Containers\MarketPalace\Channel\UI\API\Transformers\ChannelTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllChannelsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllChannels(GetAllChannelsRequest $request): array
    {
        $channels = app(GetAllChannelsAction::class)->run($request);

        return $this->transform($channels, ChannelTransformer::class);
    }
}
