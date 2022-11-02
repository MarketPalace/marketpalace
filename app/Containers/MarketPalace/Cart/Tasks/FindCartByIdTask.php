<?php

namespace App\Containers\MarketPalace\Cart\Tasks;

use App\Containers\MarketPalace\Cart\Data\Repositories\CartRepository;
use App\Containers\MarketPalace\Cart\Models\Cart;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCartByIdTask extends ParentTask
{
    public function __construct(
        protected CartRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Cart
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
