<?php

namespace App\Containers\MarketPalace\Payment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Payment\Models\Payment;
use App\Containers\MarketPalace\Payment\Tasks\UpdatePaymentTask;
use App\Containers\MarketPalace\Payment\UI\API\Requests\UpdatePaymentRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdatePaymentAction extends ParentAction
{
    /**
     * @param UpdatePaymentRequest $request
     * @return Payment
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdatePaymentRequest $request): Payment
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdatePaymentTask::class)->run($data, $request->id);
    }
}
