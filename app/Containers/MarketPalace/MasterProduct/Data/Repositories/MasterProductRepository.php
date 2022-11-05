<?php

namespace App\Containers\MarketPalace\MasterProduct\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class MasterProductRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
