<?php

namespace App\Containers\MarketPalace\Property\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Property\Models\Property;
use App\Containers\MarketPalace\Property\Tasks\UpdatePropertyTask;
use App\Containers\MarketPalace\Property\UI\API\Requests\UpdatePropertyRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdatePropertyAction extends ParentAction
{
    /**
     * @param UpdatePropertyRequest $request
     * @return Property
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdatePropertyRequest $request): Property
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdatePropertyTask::class)->run($data, $request->id);
    }
}
