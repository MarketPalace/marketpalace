<?php

namespace App\Containers\MarketPalace\Address\Tasks;

use App\Containers\MarketPalace\Address\Data\Repositories\AddressRepository;
use App\Containers\MarketPalace\Address\Models\Address;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateAddressTask extends ParentTask
{
    public function __construct(
        protected AddressRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Address
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
