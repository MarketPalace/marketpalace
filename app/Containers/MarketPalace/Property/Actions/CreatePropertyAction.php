<?php

namespace App\Containers\MarketPalace\Property\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\MarketPalace\Property\Models\Property;
use App\Containers\MarketPalace\Property\Tasks\CreatePropertyTask;
use App\Containers\MarketPalace\Property\UI\API\Requests\CreatePropertyRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreatePropertyAction extends ParentAction
{
    /**
     * @param CreatePropertyRequest $request
     * @return Property
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreatePropertyRequest $request): Property
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreatePropertyTask::class)->run($data);
    }
}
