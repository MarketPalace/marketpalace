<?php

namespace App\Containers\MarketPalace\Adjustment\Tasks;

use App\Containers\MarketPalace\Adjustment\Data\Repositories\AdjustmentRepository;
use App\Containers\MarketPalace\Adjustment\Events\AdjustmentCreatedEvent;
use App\Containers\MarketPalace\Adjustment\Models\Adjustment;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateAdjustmentTask extends ParentTask
{
    public function __construct(
        protected AdjustmentRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Adjustment
    {
        try {
            $adjustment = $this->repository->create($data);
            AdjustmentCreatedEvent::dispatch($adjustment);

            return $adjustment;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
