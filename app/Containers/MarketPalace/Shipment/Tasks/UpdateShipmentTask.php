<?php

namespace App\Containers\MarketPalace\Shipment\Tasks;

use App\Containers\MarketPalace\Shipment\Data\Repositories\ShipmentRepository;
use App\Containers\MarketPalace\Shipment\Models\Shipment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateShipmentTask extends ParentTask
{
    public function __construct(
        protected ShipmentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Shipment
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
