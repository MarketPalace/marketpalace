<?php

namespace App\Containers\MarketPalace\Link\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Link\Models\Link;
use App\Containers\MarketPalace\Link\Tasks\UpdateLinkTask;
use App\Containers\MarketPalace\Link\UI\API\Requests\UpdateLinkRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateLinkAction extends ParentAction
{
    /**
     * @param UpdateLinkRequest $request
     * @return Link
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateLinkRequest $request): Link
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateLinkTask::class)->run($data, $request->id);
    }
}
