<?php

namespace App\Containers\MarketPalace\MasterProduct\Tasks;

use App\Containers\MarketPalace\MasterProduct\Data\Repositories\MasterProductRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteMasterProductTask extends ParentTask
{
    public function __construct(
        protected MasterProductRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            return $this->repository->delete($id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
