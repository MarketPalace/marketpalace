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

use App\Containers\MarketPalace\Address\Models\AddressProxy;
use App\Containers\MarketPalace\Shipment\Contracts\Shipment as ShipmentContract;
use App\Containers\MarketPalace\Shipment\Contracts\ShipmentStatus;
use App\Containers\MarketPalace\Shipment\Traits\BelongsToCarrier;
use App\Ship\Contracts\MarketPalace\Address;
use App\Ship\Parents\Models\Model as ParentModel;
use App\Ship\Utils\CastsEnums;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string|null $tracking_number
 * @property int $address_id
 * @property int|null $carrier_id
 * @property bool $is_trackable
 * @property ShipmentStatus $status
 * @property float|null $weight
 * @property float|null $width
 * @property float|null $height
 * @property float|null $length
 * @property string|null $comment
 * @property array $configuration
 *
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read null|Address $address
 *
 * @method static Shipment create(array $attributes)
 */
class Shipment extends ParentModel implements ShipmentContract
{
    use CastsEnums;
    use BelongsToCarrier;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected array $enums = [
        'status' => 'ShipmentStatusProxy@enumClass',
    ];

    protected $casts = [
        'configuration' => 'json',
        'is_trackable' => 'bool',
        'weight' => 'float',
        'height' => 'float',
        'width' => 'float',
        'length' => 'float',
    ];

    protected string $resourceKey = 'Shipment';

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (null === $model->configuration) {
                $model->configuration = [];
            }
        });
    }

    public function status(): ShipmentStatus
    {
        return $this->status;
    }

    public function deliveryAddress(): Address
    {
        return $this->address;
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(AddressProxy::modelClass(), 'address_id', 'id');
    }
}
