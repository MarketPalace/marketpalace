<?php

namespace App\Containers\MarketPalace\MasterProduct\Tasks;

use App\Containers\MarketPalace\MasterProduct\Data\Repositories\MasterProductRepository;
use App\Containers\MarketPalace\MasterProduct\Models\MasterProduct;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateMasterProductTask extends ParentTask
{
    public function __construct(
        protected MasterProductRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): MasterProduct
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
