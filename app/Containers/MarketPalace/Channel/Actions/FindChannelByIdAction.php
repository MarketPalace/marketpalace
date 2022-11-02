<?php

namespace App\Containers\MarketPalace\Channel\Actions;

use App\Containers\MarketPalace\Channel\Models\Channel;
use App\Containers\MarketPalace\Channel\Tasks\FindChannelByIdTask;
use App\Containers\MarketPalace\Channel\UI\API\Requests\FindChannelByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindChannelByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindChannelByIdRequest $request): Channel
    {
        return app(FindChannelByIdTask::class)->run($request->id);
    }
}
