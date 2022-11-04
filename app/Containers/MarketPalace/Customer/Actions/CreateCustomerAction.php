<?php

namespace App\Containers\MarketPalace\Customer\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Containers\MarketPalace\Customer\Tasks\CreateCustomerTask;
use App\Containers\MarketPalace\Customer\UI\API\Requests\CreateCustomerRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCustomerAction extends ParentAction
{
    /**
     * @param CreateCustomerRequest $request
     * @return Customer
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCustomerRequest $request): Customer
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateCustomerTask::class)->run($data);
    }
}
