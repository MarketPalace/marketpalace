<?php

namespace App\Containers\MarketPalace\Payment\Actions;

use App\Containers\MarketPalace\Payment\Models\Payment;
use App\Containers\MarketPalace\Payment\Tasks\FindPaymentByIdTask;
use App\Containers\MarketPalace\Payment\UI\API\Requests\FindPaymentByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindPaymentByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindPaymentByIdRequest $request): Payment
    {
        return app(FindPaymentByIdTask::class)->run($request->id);
    }
}
