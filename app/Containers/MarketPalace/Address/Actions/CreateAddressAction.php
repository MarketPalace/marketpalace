<?php

namespace App\Containers\MarketPalace\Address\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Address\Models\Address;
use App\Containers\MarketPalace\Address\Tasks\CreateAddressTask;
use App\Containers\MarketPalace\Address\UI\API\Requests\CreateAddressRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateAddressAction extends ParentAction
{
    /**
     * @param CreateAddressRequest $request
     * @return Address
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateAddressRequest $request): Address
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateAddressTask::class)->run($data);
    }
}
