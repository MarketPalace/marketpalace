<?php

namespace App\Containers\MarketPalace\Payment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Payment\Models\Payment;
use App\Containers\MarketPalace\Payment\Tasks\CreatePaymentTask;
use App\Containers\MarketPalace\Payment\UI\API\Requests\CreatePaymentRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreatePaymentAction extends ParentAction
{
    /**
     * @param CreatePaymentRequest $request
     * @return Payment
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreatePaymentRequest $request): Payment
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreatePaymentTask::class)->run($data);
    }
}
