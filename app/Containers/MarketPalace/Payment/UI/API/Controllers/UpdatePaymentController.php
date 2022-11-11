<?php

namespace App\Containers\MarketPalace\Payment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Payment\Actions\UpdatePaymentAction;
use App\Containers\MarketPalace\Payment\UI\API\Requests\UpdatePaymentRequest;
use App\Containers\MarketPalace\Payment\UI\API\Transformers\PaymentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdatePaymentController extends ApiController
{
    /**
     * @param UpdatePaymentRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updatePayment(UpdatePaymentRequest $request): array
    {
        $payment = app(UpdatePaymentAction::class)->run($request);

        return $this->transform($payment, PaymentTransformer::class);
    }
}
