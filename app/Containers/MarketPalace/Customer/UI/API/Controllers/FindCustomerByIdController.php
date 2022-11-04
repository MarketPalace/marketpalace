<?php

namespace App\Containers\MarketPalace\Customer\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Customer\Actions\FindCustomerByIdAction;
use App\Containers\MarketPalace\Customer\UI\API\Requests\FindCustomerByIdRequest;
use App\Containers\MarketPalace\Customer\UI\API\Transformers\CustomerTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindCustomerByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findCustomerById(FindCustomerByIdRequest $request): array
    {
        $customer = app(FindCustomerByIdAction::class)->run($request);

        return $this->transform($customer, CustomerTransformer::class);
    }
}
