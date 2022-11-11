<?php

declare(strict_types=1);

/**
 * Contains the PropertyValue class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Property\Models;

use App\Containers\MarketPalace\Property\Contracts\Property;
use App\Containers\MarketPalace\Property\Contracts\PropertyValue as PropertyValueContract;
use App\Ship\Parents\Models\Model as ParentModel;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property Property $property
 * @property string $value      The value as stored in the db @see getCastedValue()
 * @property string $title
 * @property integer $priority
 * @property array|null $settings
 *
 * @method static Builder byProperty(int|Property $property)
 * @method Builder sort()
 * @method Builder sortReverse()
 *
 */
class PropertyValue extends ParentModel implements PropertyValueContract
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'property_values';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'settings' => 'array'
    ];

    public static function findByPropertyAndValue(string $propertySlug, mixed $value): ?PropertyValueContract
    {
        if (null === $property = PropertyProxy::findBySlug($propertySlug)) {
            return null;
        }

        return static::byProperty($property)->whereSlug($value)->first();
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(PropertyProxy::modelClass());
    }

    public function scopeSort($query)
    {
        return $query->orderBy('priority');
    }

    public function scopeSortReverse($query)
    {
        return $query->orderBy('priority', 'desc');
    }

    public function scopeByProperty($query, $property)
    {
        $id = is_object($property) ? $property->id : $property;

        return $query->where('property_id', $id);
    }

    /**
     * Returns the transformed value according to the underlying type
     */
    public function getCastedValue()
    {
        return $this->property->getType()->transformValue((string) $this->value, $this->settings);
    }

    public function scopeWithUniqueSlugConstraints(
        Builder $query,
        ParentModel $model,
        $attribute,
        $config,
        $slug
    ): Builder {
        return $query->where('property_id', $model->property->id);
    }

    public function sluggable(): array
    {
        return [
            'value' => [
                'source' => 'title'
            ]
        ];
    }
}
