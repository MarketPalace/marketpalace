<?php
/**
 * Contains the Province model class
 *
 * @copyright   Copyright (c) 2016 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Models;

use App\Containers\MarketPalace\Address\Contracts\Province as ProvinceContract;
use App\Containers\MarketPalace\Address\Enums\ProvinceType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Ship\Utils\CastsEnums;

/**
 * Province Entity class
 *
 * @property int $id
 * @property string $country_id
 * @property ProvinceType $type
 * @property string $code       Max 16 characters
 * @property string $name
 * @property ?Province $parent
 * @property Collection $children
 *
 * @property-read Country $country
 */
class Province extends Model implements ProvinceContract
{
    use CastsEnums;

    public $timestamps = false;

    protected $table = 'provinces';

    protected $guarded = ['id'];

    protected $enums = [
        'type' => 'ProvinceTypeProxy@enumClass'
    ];

    public static function findByCountryAndCode($country, string $code): ?ProvinceContract
    {
        $country = is_object($country) ? $country->id : $country;

        return ProvinceProxy::byCountry($country)
            ->where('code', $code)
            ->take(1)
            ->get()
            ->first();
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(CountryProxy::modelClass(), 'country_id');
    }

    public function removeParent(): void
    {
        $this->parent()->dissociate();
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProvinceProxy::modelClass(), 'parent_id');
    }

    public function setParent(ProvinceContract $province): void
    {
        $this->parent()->associate($province);
    }

    public function hasParent(): bool
    {
        return null !== $this->parent_id;
    }

    public function children(): HasMany
    {
        return $this->hasMany(ProvinceProxy::modelClass(), 'parent_id');
    }

    public function scopeByCountry($query, $country)
    {
        $country = is_object($country) ? $country->id : $country;

        return $query->where('country_id', $country);
    }

    public function scopeByType($query, $provinceType)
    {
        $type = is_object($provinceType) ? $provinceType->value() : $provinceType;

        return $query->where('type', $type);
    }

    public function scopeSortByName($query)
    {
        return $query->orderBy('name');
    }
}
