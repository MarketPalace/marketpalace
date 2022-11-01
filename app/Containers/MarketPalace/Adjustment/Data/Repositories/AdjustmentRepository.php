<?php

namespace App\Containers\MarketPalace\Adjustment\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class AdjustmentRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
