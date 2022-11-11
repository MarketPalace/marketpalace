<?php

namespace App\Containers\MarketPalace\Shipment\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\MarketPalace\Shipment\Data\Repositories\ShipmentRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllShipmentsTask extends ParentTask
{
    public function __construct(
        protected ShipmentRepository $repository
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
