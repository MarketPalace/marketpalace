<?php

namespace App\Containers\MarketPalace\Link\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class LinkRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
