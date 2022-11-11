<?php

declare(strict_types=1);

/**
 * Contains the ShippingMethod class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace MarketPalace\Shipment\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use MarketPalace\Shipment\Traits\BelongsToCarrier;

/**
 * @property int $id
 * @property string $name
 * @property int|null $carrier_id
 * @property array $configuration
 */
class ShippingMethod extends ParentModel
{
    use BelongsToCarrier;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'configuration' => 'json',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (null === $model->configuration) {
                $model->configuration = [];
            }
        });
    }
}
