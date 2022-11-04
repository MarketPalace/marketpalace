<?php

namespace App\Containers\MarketPalace\Product\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ProductRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
