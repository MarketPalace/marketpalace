<?php

declare(strict_types=1);

/**
 * Contains the Property class.
 *
 * @copyright   Copyright (c) 2018 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Property\Models;

use App\Containers\MarketPalace\Property\Contracts\Property as PropertyContract;
use App\Containers\MarketPalace\Property\Contracts\PropertyType;
use App\Containers\MarketPalace\Property\Exceptions\UnknownPropertyTypeException;
use App\Containers\MarketPalace\Property\PropertyTypes;
use App\Ship\Parents\Models\Model as ParentModel;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property string     $name
 * @property string     $slug
 * @property string     $type
 * @property array      $configuration
 * @property Collection $propertyValues
 */
class Property extends ParentModel implements PropertyContract
{
    use Sluggable;
    use SluggableScopeHelpers {
        findBySlug as protected sluggableFindBySlug;
    }

    protected $table = 'properties';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'configuration' => 'array'
    ];

    protected string $resourceKey = 'Property';

    public function getType(): PropertyType
    {
        $class = PropertyTypes::getClass($this->type);

        if (!$class) {
            throw new UnknownPropertyTypeException(
                sprintf('Unknown property type `%s`', $this->type)
            );
        }

        return new $class();
    }

    public static function findBySlug(string $slug): ?PropertyContract
    {
        return static::sluggableFindBySlug($slug);
    }

    public static function findOneByName(string $name): ?PropertyContract
    {
        return PropertyProxy::where('name', $name)->first();
    }

    public function values(): Collection
    {
        return $this->propertyValues()->sort()->get();
    }

    public function propertyValues(): HasMany
    {
        return $this->hasMany(PropertyValueProxy::modelClass());
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
