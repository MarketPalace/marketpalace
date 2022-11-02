<?php

namespace App\Containers\MarketPalace\Channel\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Channel\Models\Channel;
use App\Containers\MarketPalace\Channel\Tasks\UpdateChannelTask;
use App\Containers\MarketPalace\Channel\UI\API\Requests\UpdateChannelRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateChannelAction extends ParentAction
{
    /**
     * @param UpdateChannelRequest $request
     * @return Channel
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateChannelRequest $request): Channel
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateChannelTask::class)->run($data, $request->id);
    }
}
