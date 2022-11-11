<?php

namespace App\Containers\MarketPalace\Payment\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Payment\Actions\FindPaymentByIdAction;
use App\Containers\MarketPalace\Payment\UI\API\Requests\FindPaymentByIdRequest;
use App\Containers\MarketPalace\Payment\UI\API\Transformers\PaymentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindPaymentByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findPaymentById(FindPaymentByIdRequest $request): array
    {
        $payment = app(FindPaymentByIdAction::class)->run($request);

        return $this->transform($payment, PaymentTransformer::class);
    }
}
