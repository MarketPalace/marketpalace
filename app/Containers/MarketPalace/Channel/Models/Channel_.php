<?php

namespace App\Containers\MarketPalace\Channel\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Channel extends ParentModel
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
    protected string $resourceKey = 'Channel';
}
