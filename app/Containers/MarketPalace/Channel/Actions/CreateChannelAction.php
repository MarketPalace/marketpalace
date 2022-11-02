<?php

namespace App\Containers\MarketPalace\Channel\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Channel\Models\Channel;
use App\Containers\MarketPalace\Channel\Tasks\CreateChannelTask;
use App\Containers\MarketPalace\Channel\UI\API\Requests\CreateChannelRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateChannelAction extends ParentAction
{
    /**
     * @param CreateChannelRequest $request
     * @return Channel
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateChannelRequest $request): Channel
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateChannelTask::class)->run($data);
    }
}
