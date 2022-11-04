<?php

namespace App\Containers\MarketPalace\Customer\Actions;

use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Containers\MarketPalace\Customer\Tasks\FindCustomerByIdTask;
use App\Containers\MarketPalace\Customer\UI\API\Requests\FindCustomerByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCustomerByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindCustomerByIdRequest $request): Customer
    {
        return app(FindCustomerByIdTask::class)->run($request->id);
    }
}
