<?php

namespace App\Containers\MarketPalace\Shipment\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ShipmentRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
