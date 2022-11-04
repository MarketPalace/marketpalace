<?php

namespace App\Containers\MarketPalace\Link\Tasks;

use App\Containers\MarketPalace\Link\Data\Repositories\LinkRepository;
use App\Containers\MarketPalace\Link\Models\Link;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindLinkByIdTask extends ParentTask
{
    public function __construct(
        protected LinkRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Link
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
