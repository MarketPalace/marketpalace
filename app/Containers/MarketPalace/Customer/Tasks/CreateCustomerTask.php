<?php

namespace App\Containers\MarketPalace\Customer\Tasks;

use App\Containers\MarketPalace\Customer\Data\Repositories\CustomerRepository;
use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCustomerTask extends ParentTask
{
    public function __construct(
        protected CustomerRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Customer
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
