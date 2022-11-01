<?php

namespace App\Containers\MarketPalace\Address\Actions;

use App\Containers\MarketPalace\Address\Tasks\DeleteAddressTask;
use App\Containers\MarketPalace\Address\UI\API\Requests\DeleteAddressRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteAddressAction extends ParentAction
{
    /**
     * @param DeleteAddressRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteAddressRequest $request): int
    {
        return app(DeleteAddressTask::class)->run($request->id);
    }
}
