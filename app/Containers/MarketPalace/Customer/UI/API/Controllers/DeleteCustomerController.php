<?php

namespace App\Containers\MarketPalace\Customer\UI\API\Controllers;

use App\Containers\MarketPalace\Customer\Actions\DeleteCustomerAction;
use App\Containers\MarketPalace\Customer\UI\API\Requests\DeleteCustomerRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteCustomerController extends ApiController
{
    /**
     * @param DeleteCustomerRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteCustomer(DeleteCustomerRequest $request): JsonResponse
    {
        app(DeleteCustomerAction::class)->run($request);

        return $this->noContent();
    }
}
