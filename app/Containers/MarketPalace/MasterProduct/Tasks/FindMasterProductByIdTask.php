<?php

namespace App\Containers\MarketPalace\MasterProduct\Tasks;

use App\Containers\MarketPalace\MasterProduct\Data\Repositories\MasterProductRepository;
use App\Containers\MarketPalace\MasterProduct\Models\MasterProduct;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindMasterProductByIdTask extends ParentTask
{
    public function __construct(
        protected MasterProductRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): MasterProduct
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
