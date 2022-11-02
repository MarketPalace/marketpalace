<?php

namespace App\Containers\MarketPalace\Channel\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ChannelRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
