<?php

namespace App\Containers\MarketPalace\MasterProduct\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\MasterProduct\Data\Repositories\MasterProductRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllMasterProductsTask extends ParentTask
{
    public function __construct(
        protected MasterProductRepository $repository
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
