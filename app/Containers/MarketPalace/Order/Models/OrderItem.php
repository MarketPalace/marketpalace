<?php

declare(strict_types=1);

/**
 * Contains the OrderItem model class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Order\Models;

use Illuminate\Database\Eloquent\Model;
use App\Containers\MarketPalace\Order\Contracts\OrderItem as OrderItemContract;

class OrderItem extends Model implements OrderItemContract
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected string $resourceKey = 'OrderItem';

    public function order()
    {
        return $this->belongsTo(OrderProxy::modelClass());
    }

    public function product()
    {
        return $this->morphTo();
    }

    public function total()
    {
        return $this->price * $this->quantity;
    }

    /**
     * Property accessor alias to the total() method
     *
     * @return float
     */
    public function getTotalAttribute()
    {
        return $this->total();
    }
}
