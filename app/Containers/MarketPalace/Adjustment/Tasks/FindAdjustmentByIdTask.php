<?php

namespace App\Containers\MarketPalace\Adjustment\Tasks;

use App\Containers\MarketPalace\Adjustment\Data\Repositories\AdjustmentRepository;
use App\Containers\MarketPalace\Adjustment\Events\AdjustmentFoundByIdEvent;
use App\Containers\MarketPalace\Adjustment\Models\Adjustment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindAdjustmentByIdTask extends ParentTask
{
    public function __construct(
        protected AdjustmentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Adjustment
    {
        try {
            $adjustment = $this->repository->find($id);
            AdjustmentFoundByIdEvent::dispatch($adjustment);

            return $adjustment;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
