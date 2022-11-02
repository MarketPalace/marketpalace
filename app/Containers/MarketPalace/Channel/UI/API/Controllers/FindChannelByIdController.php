<?php

namespace App\Containers\MarketPalace\Channel\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Channel\Actions\FindChannelByIdAction;
use App\Containers\MarketPalace\Channel\UI\API\Requests\FindChannelByIdRequest;
use App\Containers\MarketPalace\Channel\UI\API\Transformers\ChannelTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindChannelByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findChannelById(FindChannelByIdRequest $request): array
    {
        $channel = app(FindChannelByIdAction::class)->run($request);

        return $this->transform($channel, ChannelTransformer::class);
    }
}
