<?php

namespace App\Containers\MarketPalace\Payment\Tasks;

use App\Containers\MarketPalace\Payment\Data\Repositories\PaymentRepository;
use App\Containers\MarketPalace\Payment\Models\Payment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindPaymentByIdTask extends ParentTask
{
    public function __construct(
        protected PaymentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Payment
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
