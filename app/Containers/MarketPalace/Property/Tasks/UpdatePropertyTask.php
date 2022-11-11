<?php

namespace App\Containers\MarketPalace\Property\Tasks;

use App\Containers\MarketPalace\Property\Data\Repositories\PropertyRepository;
use App\Containers\MarketPalace\Property\Models\Property;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdatePropertyTask extends ParentTask
{
    public function __construct(
        protected PropertyRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Property
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
