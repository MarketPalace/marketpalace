<?php

namespace App\Containers\MarketPalace\Adjustment\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Adjustment\Data\Repositories\AdjustmentRepository;
use App\Containers\MarketPalace\Adjustment\Events\AdjustmentsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllAdjustmentsTask extends ParentTask
{
    public function __construct(
        protected AdjustmentRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        AdjustmentsListedEvent::dispatch($result);

        return $result;
    }
}
