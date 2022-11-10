<?php

namespace App\Containers\MarketPalace\Order\Tasks;

use App\Containers\MarketPalace\Order\Data\Repositories\OrderRepository;
use App\Containers\MarketPalace\Order\Models\Order;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindOrderByIdTask extends ParentTask
{
    public function __construct(
        protected OrderRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Order
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
