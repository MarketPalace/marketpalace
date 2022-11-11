<?php

declare(strict_types=1);

/**
 * Contains the Carrier class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Shipment\Models;

use Illuminate\Database\Eloquent\Builder;
use App\Ship\Parents\Models\Model as ParentModel;
use App\Containers\MarketPalace\Shipment\Contracts\Carrier as CarrierContract;

/**
 * @property int               $id
 * @property string            $name
 * @property bool              $is_active
 * @property array             $configuration
 *
 * @method Builder actives()
 * @method Builder inactives()
 *
 * @method static Carrier create(array $attributes)
 */
class Carrier extends ParentModel implements CarrierContract
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'configuration' => 'json',
        'is_active' => 'bool',
    ];

    protected string $resourceKey = 'Carrier';

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (null === $model->configuration) {
                $model->configuration = [];
            }
        });
    }

    public function scopeActives(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeInactives(Builder $query): Builder
    {
        return $query->where('is_active', false);
    }

    public function name(): string
    {
        return $this->name;
    }
}
