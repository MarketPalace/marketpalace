<?php

namespace App\Containers\MarketPalace\Payment\UI\API\Controllers;

use App\Containers\MarketPalace\Payment\Actions\DeletePaymentAction;
use App\Containers\MarketPalace\Payment\UI\API\Requests\DeletePaymentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeletePaymentController extends ApiController
{
    /**
     * @param DeletePaymentRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deletePayment(DeletePaymentRequest $request): JsonResponse
    {
        app(DeletePaymentAction::class)->run($request);

        return $this->noContent();
    }
}
