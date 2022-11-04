<?php

namespace App\Containers\MarketPalace\Link\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Link\Models\Link;
use App\Containers\MarketPalace\Link\Tasks\CreateLinkTask;
use App\Containers\MarketPalace\Link\UI\API\Requests\CreateLinkRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateLinkAction extends ParentAction
{
    /**
     * @param CreateLinkRequest $request
     * @return Link
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateLinkRequest $request): Link
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateLinkTask::class)->run($data);
    }
}
