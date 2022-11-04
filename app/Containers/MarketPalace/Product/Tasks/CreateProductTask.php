<?php

namespace App\Containers\MarketPalace\Product\Tasks;

use App\Containers\MarketPalace\Product\Data\Repositories\ProductRepository;
use App\Containers\MarketPalace\Product\Models\Product;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateProductTask extends ParentTask
{
    public function __construct(
        protected ProductRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Product
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
