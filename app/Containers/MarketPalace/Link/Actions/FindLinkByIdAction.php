<?php

namespace App\Containers\MarketPalace\Link\Actions;

use App\Containers\MarketPalace\Link\Models\Link;
use App\Containers\MarketPalace\Link\Tasks\FindLinkByIdTask;
use App\Containers\MarketPalace\Link\UI\API\Requests\FindLinkByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindLinkByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindLinkByIdRequest $request): Link
    {
        return app(FindLinkByIdTask::class)->run($request->id);
    }
}
