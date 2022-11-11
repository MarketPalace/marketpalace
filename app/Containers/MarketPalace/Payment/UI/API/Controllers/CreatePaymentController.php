<?php

namespace App\Containers\MarketPalace\Payment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Payment\Actions\CreatePaymentAction;
use App\Containers\MarketPalace\Payment\UI\API\Requests\CreatePaymentRequest;
use App\Containers\MarketPalace\Payment\UI\API\Transformers\PaymentTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreatePaymentController extends ApiController
{
    /**
     * @param CreatePaymentRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createPayment(CreatePaymentRequest $request): JsonResponse
    {
        $payment = app(CreatePaymentAction::class)->run($request);

        return $this->created($this->transform($payment, PaymentTransformer::class));
    }
}
