<?php

namespace App\Containers\MarketPalace\Payment\Actions;

use App\Containers\MarketPalace\Payment\Tasks\DeletePaymentTask;
use App\Containers\MarketPalace\Payment\UI\API\Requests\DeletePaymentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeletePaymentAction extends ParentAction
{
    /**
     * @param DeletePaymentRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeletePaymentRequest $request): int
    {
        return app(DeletePaymentTask::class)->run($request->id);
    }
}
