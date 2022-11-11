<?php

namespace App\Containers\MarketPalace\Payment\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Payment\Data\Repositories\PaymentRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllPaymentsTask extends ParentTask
{
    public function __construct(
        protected PaymentRepository $repository
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
