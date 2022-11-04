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

use App\Containers\MarketPalace\Cart\Contracts\Cart as CartContract;
use App\Containers\MarketPalace\Cart\Enums\CartStateProxy;
use App\Containers\MarketPalace\Cart\Exceptions\InvalidCartConfigurationException;
use App\Ship\Contracts\MarketPalace\Buyable;
use App\Ship\Parents\Models\Model as ParentModel;
use App\Ship\Utils\CastsEnums;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;

class Cart extends ParentModel implements CartContract
{
    use CastsEnums;

    public const EXTRA_PRODUCT_MERGE_ATTRIBUTES_CONFIG_KEY = 'marketPalace.cart.items.extra_product_attributes_to_merge';
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
    protected $guarded = ['id'];

    protected array $enums = [
        'state' => 'CartStateProxy@enumClass'
    ];

    /**
     * @inheritDoc
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    /**
     * @inheritDoc
     */
    public function itemCount()
    {
        return $this->items->sum('quantity');
    }

    /**
     * @inheritDoc
     */
    public function addItem(
        Buyable $product,
        $qty = 1,
        $params = []
    ): \App\Containers\MarketPalace\Cart\Contracts\CartItem {
        $item = $this->items()->ofCart($this)->byProduct($product)->first();

        if ($item) {
            $item->quantity += $qty;
            $item->save();
        } else {
            $item = $this->items()->create(
                array_merge(
                    $this->getDefaultCartItemAttributes($product, $qty),
                    $this->getExtraProductMergeAttributes($product),
                    $params['attributes'] ?? []
                )
            );
        }

        $this->load('items');

        return $item;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(CartItemProxy::modelClass(), 'cart_id', 'id');
    }

    /**
     * Returns the default attributes of a Buyable for a cart item
     *
     * @param  Buyable  $product
     * @param  integer  $qty
     *
     * @return array
     */
    protected function getDefaultCartItemAttributes(Buyable $product, $qty)
    {
        return [
            'product_type' => $product->morphTypeName(),
            'product_id' => $product->getId(),
            'quantity' => $qty,
            'price' => $product->getPrice()
        ];
    }

    /**
     * Returns the extra product merge attributes for cart_items based on the config
     *
     * @param  Buyable  $product
     *
     * @return array
     * @throws InvalidCartConfigurationException
     *
     */
    protected function getExtraProductMergeAttributes(Buyable $product)
    {
        $result = [];
        $cfg = config(self::EXTRA_PRODUCT_MERGE_ATTRIBUTES_CONFIG_KEY, []);

        if (!is_array($cfg)) {
            throw new InvalidCartConfigurationException(
                sprintf(
                    'The value of `%s` configuration must be an array',
                    self::EXTRA_PRODUCT_MERGE_ATTRIBUTES_CONFIG_KEY
                )
            );
        }

        foreach ($cfg as $attribute) {
            if (!is_string($attribute)) {
                throw new InvalidCartConfigurationException(
                    sprintf(
                        'The configuration `%s` can only contain an array of strings, `%s` given',
                        self::EXTRA_PRODUCT_MERGE_ATTRIBUTES_CONFIG_KEY,
                        gettype($attribute)
                    )
                );
            }

            $result[$attribute] = $product->{$attribute};
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function removeProduct(Buyable $product)
    {
        $item = $this->items()->ofCart($this)->byProduct($product)->first();

        $this->removeItem($item);
    }

    /**
     * @inheritDoc
     */
    public function removeItem($item)
    {
        if ($item) {
            $item->delete();
        }

        $this->load('items');
    }

    /**
     * @inheritDoc
     */
    public function clear()
    {
        $this->items()->ofCart($this)->delete();

        $this->load('items');
    }

    /**
     * @inheritDoc
     */
    public function total(): float
    {
        return $this->items->sum('total');
    }

    /**
     * The cart's user relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        $userModel = config('marketPalace.cart.user.model') ?: config('auth.providers.users.model');

        return $this->belongsTo($userModel);
    }

    /**
     * @inheritDoc
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @inheritDoc
     */
    public function setUser($user)
    {
        if ($user instanceof Authenticatable) {
            $user = $user->id;
        }

        $this->user_id = $user;
    }

    public function scopeActives($query)
    {
        return $query->whereIn('state', CartStateProxy::getActiveStates());
    }

    public function scopeOfUser($query, $user)
    {
        return $query->where('user_id', is_object($user) ? $user->id : $user);
    }
}
