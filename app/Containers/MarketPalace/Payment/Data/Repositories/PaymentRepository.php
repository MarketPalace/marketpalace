<?php

namespace App\Containers\MarketPalace\Payment\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class PaymentRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
