<?php

declare(strict_types=1);

/**
 * Contains the Order model class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Order\Models;

use App\Containers\MarketPalace\Address\Models\AddressProxy;
use App\Containers\MarketPalace\Order\Contracts\BillPayer;
use App\Containers\MarketPalace\Order\Contracts\Order as OrderContract;
use App\Containers\MarketPalace\Order\Contracts\OrderStatus;
use App\Containers\MarketPalace\Order\Enums\OrderStatusProxy;
use App\Containers\AppSection\User\Contracts\User;
use App\Containers\AppSection\User\Models\UserProxy;
use App\Ship\Contracts\MarketPalace\Address;
use App\Ship\Parents\Models\Model as ParentModel;
use App\Ship\Utils\CastsEnums;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Traversable;

/**
 * @property int $id
 * @property string $number
 * @property string $notes
 * @property OrderStatus $status
 * @property null|int $billpayer_id
 * @property null|BillPayer $billpayer
 * @property null|int $user_id
 * @property null|User $user
 * @property null|Address $shippingAddress
 * @property null|int $shipping_address_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property null|Carbon $deleted_at
 * @property OrderItem[]|Collection $items
 * @method static Order create(array $attributes = [])
 * @method static Builder open()
 */
class Order extends ParentModel implements OrderContract
{
    use CastsEnums;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $enums = [
        'status' => 'OrderStatusProxy@enumClass'
    ];

    protected string $resourceKey = 'Order';

    public function __construct(array $attributes = [])
    {
        // Set default status in case there was none given
        if (!isset($attributes['status'])) {
            $this->setDefaultOrderStatus();
        }

        parent::__construct($attributes);
    }

    protected function setDefaultOrderStatus()
    {
        $this->setRawAttributes(
            array_merge(
                $this->attributes,
                [
                    'status' => OrderStatusProxy::defaultValue()
                ]
            ),
            true
        );
    }

    public static function findByNumber(string $orderNumber): ?OrderContract
    {
        return static::where('number', $orderNumber)->first();
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function getStatus(): OrderStatus
    {
        return $this->status;
    }

    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass());
    }

    public function getBillPayer(): ?BillPayer
    {
        return $this->billpayer;
    }

    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }

    public function getItems(): Traversable
    {
        return $this->items;
    }

    public function billpayer()
    {
        return $this->belongsTo(BillPayerProxy::modelClass());
    }

    public function shippingAddress()
    {
        return $this->belongsTo(AddressProxy::modelClass());
    }

    public function items()
    {
        return $this->hasMany(OrderItemProxy::modelClass());
    }

    public function total()
    {
        return $this->items->sum('total');
    }

    public function scopeOpen(Builder $query)
    {
        return $query->whereIn('status', OrderStatusProxy::getOpenStatuses());
    }
}
