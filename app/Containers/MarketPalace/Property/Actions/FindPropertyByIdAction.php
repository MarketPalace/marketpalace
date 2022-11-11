<?php

namespace App\Containers\MarketPalace\Property\Actions;

use App\Containers\MarketPalace\Property\Models\Property;
use App\Containers\MarketPalace\Property\Tasks\FindPropertyByIdTask;
use App\Containers\MarketPalace\Property\UI\API\Requests\FindPropertyByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindPropertyByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindPropertyByIdRequest $request): Property
    {
        return app(FindPropertyByIdTask::class)->run($request->id);
    }
}
