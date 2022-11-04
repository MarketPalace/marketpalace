<?php

namespace App\Containers\MarketPalace\Product\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Product\Data\Repositories\ProductRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllProductsTask extends ParentTask
{
    public function __construct(
        protected ProductRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->addRequestCriteria()->repository->paginate();
    }
}
