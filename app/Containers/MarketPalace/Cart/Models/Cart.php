<?php

namespace App\Containers\MarketPalace\Cart\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Cart extends ParentModel
{
    protected $fillable = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Cart';
}
