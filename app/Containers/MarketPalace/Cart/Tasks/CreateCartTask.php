<?php

namespace App\Containers\MarketPalace\Cart\Tasks;

use App\Containers\MarketPalace\Cart\Data\Repositories\CartRepository;
use App\Containers\MarketPalace\Cart\Models\Cart;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCartTask extends ParentTask
{
    public function __construct(
        protected CartRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Cart
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
