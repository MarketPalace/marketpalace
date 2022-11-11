<?php

namespace App\Containers\MarketPalace\Shipment\Tasks;

use App\Containers\MarketPalace\Shipment\Data\Repositories\ShipmentRepository;
use App\Containers\MarketPalace\Shipment\Models\Shipment;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateShipmentTask extends ParentTask
{
    public function __construct(
        protected ShipmentRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Shipment
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
