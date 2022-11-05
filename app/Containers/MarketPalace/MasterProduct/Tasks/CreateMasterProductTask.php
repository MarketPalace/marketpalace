<?php

namespace App\Containers\MarketPalace\MasterProduct\Tasks;

use App\Containers\MarketPalace\MasterProduct\Data\Repositories\MasterProductRepository;
use App\Containers\MarketPalace\MasterProduct\Models\MasterProduct;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateMasterProductTask extends ParentTask
{
    public function __construct(
        protected MasterProductRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): MasterProduct
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
