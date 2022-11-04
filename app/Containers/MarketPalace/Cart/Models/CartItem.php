<?php

declare(strict_types=1);

/**
 * Contains the CartItem class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Cart\Models;

use Illuminate\Database\Eloquent\Builder;
use App\Ship\Parents\Models\Model as ParentModel;
use App\Containers\MarketPalace\Cart\Contracts\CartItem as CartItemContract;
use App\Ship\Contracts\MarketPalace\Buyable;

/**
 * @property Buyable $product
 * @property float   $total
 */
class CartItem extends ParentModel implements CartItemContract
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function product()
    {
        return $this->morphTo();
    }

    /**
     * @inheritDoc
     */
    public function getBuyable(): Buyable
    {
        return $this->product;
    }

    /**
     * @inheritDoc
     */
    public function getQuantity(): int
    {
        return (int) $this->quantity;
    }

    /**
     * @inheritDoc
     */
    public function total(): float
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

    /**
     * Scope to query items of a cart
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $cart Cart object or cart id
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCart($query, $cart)
    {
        $cartId = is_object($cart) ? $cart->id : $cart;

        return $query->where('cart_id', $cartId);
    }

    /**
     * Scope to query items by product (Buyable)
     *
     * @param Builder $query
     * @param Buyable $product
     *
     * @return Builder
     */
    public function scopeByProduct($query, Buyable $product)
    {
        return $query->where([
            ['product_id', '=', $product->getId()],
            ['product_type', '=', $product->morphTypeName()]
        ]);
    }
}
