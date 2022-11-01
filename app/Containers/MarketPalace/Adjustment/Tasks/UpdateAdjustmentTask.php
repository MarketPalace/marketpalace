<?php

namespace App\Containers\MarketPalace\Adjustment\Tasks;

use App\Containers\MarketPalace\Adjustment\Data\Repositories\AdjustmentRepository;
use App\Containers\MarketPalace\Adjustment\Events\AdjustmentUpdatedEvent;
use App\Containers\MarketPalace\Adjustment\Models\Adjustment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateAdjustmentTask extends ParentTask
{
    public function __construct(
        protected AdjustmentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Adjustment
    {
        try {
            $adjustment = $this->repository->update($data, $id);
            AdjustmentUpdatedEvent::dispatch($adjustment);

            return $adjustment;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
