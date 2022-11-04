<?php

namespace App\Containers\MarketPalace\Link\Tasks;

use App\Containers\MarketPalace\Link\Data\Repositories\LinkRepository;
use App\Containers\MarketPalace\Link\Models\Link;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateLinkTask extends ParentTask
{
    public function __construct(
        protected LinkRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Link
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
