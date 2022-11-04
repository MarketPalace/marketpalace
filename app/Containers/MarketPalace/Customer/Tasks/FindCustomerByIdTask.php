<?php

namespace App\Containers\MarketPalace\Customer\Tasks;

use App\Containers\MarketPalace\Customer\Data\Repositories\CustomerRepository;
use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCustomerByIdTask extends ParentTask
{
    public function __construct(
        protected CustomerRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Customer
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
