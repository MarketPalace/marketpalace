<?php

namespace App\Containers\MarketPalace\Property\Tasks;

use App\Containers\MarketPalace\Property\Data\Repositories\PropertyRepository;
use App\Containers\MarketPalace\Property\Models\Property;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindPropertyByIdTask extends ParentTask
{
    public function __construct(
        protected PropertyRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Property
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
