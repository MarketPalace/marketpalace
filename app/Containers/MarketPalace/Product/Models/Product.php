<?php

declare(strict_types=1);

/**
 * Contains the Product class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalce
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Product\Models;

use App\Containers\MarketPalace\Product\Contracts\Product as ProductContract;
use App\Containers\MarketPalace\Product\Enums\ProductState;
use App\Containers\MarketPalace\Product\Enums\ProductStateProxy;
use App\Ship\Contracts\MarketPalace\Dimension;
use App\Ship\Parents\Models\Model as ParentModel;
use App\Ship\Utils\CastsEnums;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property string $sku
 * @property float|null $price
 * @property float|null $original_price
 * @property string|null $excerpt
 * @property string|null $description
 * @property ProductState $state
 * @property float|null $weight
 * @property float|null $width
 * @property float|null $height
 * @property float|null $length
 * @property string|null $ext_title
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property null|Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @method static Product create(array $attributes)
 */
class Product extends ParentModel implements ProductContract
{
    use CastsEnums;
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'products';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'price' => 'float',
        'original_price' => 'float',
        'weight' => 'float',
        'height' => 'float',
        'width' => 'float',
        'length' => 'float',
    ];

    protected $enums = [
        'state' => 'ProductStateProxy@enumClass'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getIsActiveAttribute(): bool
    {
        return $this->isActive();
    }

    public function isActive(): bool
    {
        return $this->state->isActive();
    }

    public function isOnStock(): bool
    {
        return $this->stock > 0;
    }

    public function getTitleAttribute(): string
    {
        return $this->title();
    }

    public function title(): string
    {
        return $this->ext_title ?? $this->name;
    }

    public function scopeActives(Builder $query): Builder
    {
        return $query->whereIn(
            'state',
            ProductStateProxy::getActiveStates()
        );
    }

    public function dimension(): ?Dimension
    {
        if (!$this->hasDimensions()) {
            return null;
        }

        return new class ($this->width, $this->height, $this->length) implements Dimension {
            public function __construct(private float $width, private float $height, private float $length)
            {
            }

            public function width(): float
            {
                return $this->width;
            }

            public function height(): float
            {
                return $this->height;
            }

            public function length(): float
            {
                return $this->length;
            }
        };
    }

    public function hasDimensions(): bool
    {
        return null !== $this->width && null !== $this->height && null !== $this->length;
    }
}
