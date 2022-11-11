<?php

namespace App\Containers\MarketPalace\Property\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class PropertyRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
