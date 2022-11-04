<?php

namespace App\Containers\MarketPalace\Product\Tasks;

use App\Containers\MarketPalace\Product\Data\Repositories\ProductRepository;
use App\Containers\MarketPalace\Product\Models\Product;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindProductByIdTask extends ParentTask
{
    public function __construct(
        protected ProductRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Product
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
