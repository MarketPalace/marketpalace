<?php

declare(strict_types=1);

/**
 * Contains the LinkType class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Support\Carbon;
use App\Containers\MarketPalace\Link\Contracts\LinkType as LinkTypeContract;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property bool $is_active
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @method static LinkType create(array $attributes)
 * @method static Builder bySlug(string $slug)
 * @method static Builder active()
 * @method static Builder inactive()
 */
class LinkType extends ParentModel implements LinkTypeContract
{
    use Sluggable;
    use SluggableScopeHelpers {
        findBySlug as protected sluggableFindBySlug;
    }

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function findBySlug(string $slug): ?LinkTypeContract
    {
        return static::sluggableFindBySlug($slug);
    }

    public static function choices(bool|array $withInactives = false, bool $slugAsKey = false): array
    {
        if (empty($withInactives)) {
            $query = static::active();
        } elseif (true === $withInactives) {
            $query = static::query();
        } else {
            $lookupField = (is_int($withInactives[0] ?? null)) ? 'id' : 'slug';
            $query = static::active()->orWhereIn($lookupField, $withInactives);
        }

        $keyField = $slugAsKey ? 'slug' : 'id';

        return $query->get([$keyField, 'name'])->pluck('name', $keyField)->all();
    }

    public function scopeBySlug(Builder $builder, string $slug): Builder
    {
        return $this->scopeWhereSlug($builder, $slug);
    }

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('is_active', true);
    }

    public function scopeInactive(Builder $builder): Builder
    {
        return $builder->where('is_active', false);
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
