<?php

namespace App\Containers\MarketPalace\Payment\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Payment\Actions\GetAllPaymentsAction;
use App\Containers\MarketPalace\Payment\UI\API\Requests\GetAllPaymentsRequest;
use App\Containers\MarketPalace\Payment\UI\API\Transformers\PaymentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllPaymentsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllPayments(GetAllPaymentsRequest $request): array
    {
        $payments = app(GetAllPaymentsAction::class)->run($request);

        return $this->transform($payments, PaymentTransformer::class);
    }
}
