<?php

namespace App\Containers\MarketPalace\Address\Actions;

use App\Containers\MarketPalace\Address\Models\Address;
use App\Containers\MarketPalace\Address\Tasks\FindAddressByIdTask;
use App\Containers\MarketPalace\Address\UI\API\Requests\FindAddressByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindAddressByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindAddressByIdRequest $request): Address
    {
        return app(FindAddressByIdTask::class)->run($request->id);
    }
}
