<?php

declare(strict_types=1);

/**
 * Contains the MasterProduct class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\MasterProduct\Models;

use App\Containers\MarketPalace\MasterProduct\Contracts\MasterProduct as MasterProductContract;
use App\Containers\MarketPalace\Product\Enums\ProductState;
use App\Containers\MarketPalace\Product\Enums\ProductStateProxy;
use App\Ship\Parents\Models\Model as ParentModel;
use App\Ship\Utils\CastsEnums;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

/**
 * @property int $id
 * @property string $name
 * @property string|null $slug
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
 * @property-read bool $is_active
 * @property-read string|null $title
 *
 * @method static MasterProduct create(array $attributes = [])
 */
class MasterProduct extends ParentModel implements MasterProductContract
{
    use CastsEnums;
    use Sluggable;
    use SluggableScopeHelpers;

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
        'state' => ProductStateProxy::class.'@enumClass',
    ];

    protected string $resourceKey = 'MasterProduct';

    public function variants(): HasMany
    {
        return $this->hasMany(MasterProductVariantProxy::modelClass(), 'master_product_id', 'id');
    }

    public function createVariant(array $attributes): MasterProductVariant
    {
        $variant = MasterProductVariantProxy::create(
            array_merge(
                Arr::except($attributes, ['properties']),
                ['master_product_id' => $this->id],
            )
        );

        if (Arr::exists($attributes, 'properties') && method_exists($variant, 'assignPropertyValues')) {
            $variant->assignPropertyValues($attributes['properties']);
        }

        return $variant;
    }

    public function getIsActiveAttribute(): bool
    {
        return $this->isActive();
    }

    public function isActive(): bool
    {
        return $this->state->isActive();
    }

    public function getTitleAttribute(): string
    {
        return $this->title();
    }

    public function title(): string
    {
        return $this->ext_title ?? $this->name;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
