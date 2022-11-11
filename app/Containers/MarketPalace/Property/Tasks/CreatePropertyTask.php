<?php

namespace App\Containers\MarketPalace\Property\Tasks;

use App\Containers\MarketPalace\Property\Data\Repositories\PropertyRepository;
use App\Containers\MarketPalace\Property\Models\Property;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreatePropertyTask extends ParentTask
{
    public function __construct(
        protected PropertyRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Property
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
