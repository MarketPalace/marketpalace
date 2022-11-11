<?php

namespace App\Containers\MarketPalace\Payment\Tasks;

use App\Containers\MarketPalace\Payment\Data\Repositories\PaymentRepository;
use App\Containers\MarketPalace\Payment\Models\Payment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdatePaymentTask extends ParentTask
{
    public function __construct(
        protected PaymentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Payment
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
