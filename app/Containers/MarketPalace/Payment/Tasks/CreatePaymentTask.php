<?php

namespace App\Containers\MarketPalace\Payment\Tasks;

use App\Containers\MarketPalace\Payment\Data\Repositories\PaymentRepository;
use App\Containers\MarketPalace\Payment\Models\Payment;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreatePaymentTask extends ParentTask
{
    public function __construct(
        protected PaymentRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Payment
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
