<?php

namespace App\Containers\MarketPalace\Customer\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Customer\Actions\UpdateCustomerAction;
use App\Containers\MarketPalace\Customer\UI\API\Requests\UpdateCustomerRequest;
use App\Containers\MarketPalace\Customer\UI\API\Transformers\CustomerTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateCustomerController extends ApiController
{
    /**
     * @param UpdateCustomerRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateCustomer(UpdateCustomerRequest $request): array
    {
        $customer = app(UpdateCustomerAction::class)->run($request);

        return $this->transform($customer, CustomerTransformer::class);
    }
}
