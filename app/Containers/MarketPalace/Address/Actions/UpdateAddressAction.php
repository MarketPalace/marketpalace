<?php

namespace App\Containers\MarketPalace\Address\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Address\Models\Address;
use App\Containers\MarketPalace\Address\Tasks\UpdateAddressTask;
use App\Containers\MarketPalace\Address\UI\API\Requests\UpdateAddressRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateAddressAction extends ParentAction
{
    /**
     * @param UpdateAddressRequest $request
     * @return Address
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateAddressRequest $request): Address
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateAddressTask::class)->run($data, $request->id);
    }
}
