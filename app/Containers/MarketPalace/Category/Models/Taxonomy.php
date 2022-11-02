<?php

declare(strict_types=1);

/**
 * Contains the Taxonomy class.
 *
 * @copyright   Copyright (c) 2018 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *  */

namespace App\Containers\MarketPalace\Category\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use App\Containers\MarketPalace\Category\Contracts\Taxonomy as TaxonomyContract;

class Taxonomy extends ParentModel implements TaxonomyContract
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'taxonomies';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = [];

    protected $hidden = [];

    protected $casts = [];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Taxonomy';

    public static function findOneByName(string $name): ?TaxonomyContract
    {
        return static::where('name', $name)->first();
    }

    public static function findOneBySlug(string $slug, array $columns = ['*']): ?TaxonomyContract
    {
        return static::findBySlug($slug, $columns);
    }

    public function taxa(): HasMany
    {
        return $this->hasMany(TaxonProxy::modelClass(), 'taxonomy_id', 'id');
    }

    public function taxons(): HasMany
    {
        return $this->taxa();
    }

    public function rootLevelTaxons(): Collection
    {
        return TaxonProxy::byTaxonomy($this)
                         ->roots()
                         ->sort()
                         ->get();
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
