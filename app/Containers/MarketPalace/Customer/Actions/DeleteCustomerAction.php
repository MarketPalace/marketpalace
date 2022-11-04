<?php

namespace App\Containers\MarketPalace\Customer\Actions;

use App\Containers\MarketPalace\Customer\Tasks\DeleteCustomerTask;
use App\Containers\MarketPalace\Customer\UI\API\Requests\DeleteCustomerRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCustomerAction extends ParentAction
{
    /**
     * @param DeleteCustomerRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCustomerRequest $request): int
    {
        return app(DeleteCustomerTask::class)->run($request->id);
    }
}
