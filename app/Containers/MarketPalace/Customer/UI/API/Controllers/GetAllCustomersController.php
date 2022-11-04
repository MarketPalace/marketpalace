<?php

namespace App\Containers\MarketPalace\Customer\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\MarketPalace\Customer\Actions\GetAllCustomersAction;
use App\Containers\MarketPalace\Customer\UI\API\Requests\GetAllCustomersRequest;
use App\Containers\MarketPalace\Customer\UI\API\Transformers\CustomerTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCustomersController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCustomers(GetAllCustomersRequest $request): array
    {
        $customers = app(GetAllCustomersAction::class)->run($request);

        return $this->transform($customers, CustomerTransformer::class);
    }
}
