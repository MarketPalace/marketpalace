<?php

namespace App\Containers\MarketPalace\Customer\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Containers\MarketPalace\Customer\Tasks\UpdateCustomerTask;
use App\Containers\MarketPalace\Customer\UI\API\Requests\UpdateCustomerRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCustomerAction extends ParentAction
{
    /**
     * @param UpdateCustomerRequest $request
     * @return Customer
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCustomerRequest $request): Customer
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateCustomerTask::class)->run($data, $request->id);
    }
}
