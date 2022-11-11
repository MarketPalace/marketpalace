<?php

namespace App\Containers\MarketPalace\Property\Actions;

use App\Containers\MarketPalace\Property\Tasks\DeletePropertyTask;
use App\Containers\MarketPalace\Property\UI\API\Requests\DeletePropertyRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeletePropertyAction extends ParentAction
{
    /**
     * @param DeletePropertyRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeletePropertyRequest $request): int
    {
        return app(DeletePropertyTask::class)->run($request->id);
    }
}
