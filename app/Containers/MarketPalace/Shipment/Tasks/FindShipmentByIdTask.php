<?php

namespace App\Containers\MarketPalace\Shipment\Tasks;

use App\Containers\MarketPalace\Shipment\Data\Repositories\ShipmentRepository;
use App\Containers\MarketPalace\Shipment\Models\Shipment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindShipmentByIdTask extends ParentTask
{
    public function __construct(
        protected ShipmentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Shipment
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
