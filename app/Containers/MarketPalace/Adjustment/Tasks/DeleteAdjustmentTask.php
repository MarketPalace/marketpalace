<?php

namespace App\Containers\MarketPalace\Adjustment\Tasks;

use App\Containers\MarketPalace\Adjustment\Data\Repositories\AdjustmentRepository;
use App\Containers\MarketPalace\Adjustment\Events\AdjustmentDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteAdjustmentTask extends ParentTask
{
    public function __construct(
        protected AdjustmentRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $result = $this->repository->delete($id);
            AdjustmentDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
