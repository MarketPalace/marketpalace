<?php
/**
 * Contains the Address model class.
 *
 * @copyright   Copyright (c) 2016 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Models;

use App\Containers\MarketPalace\Address\Contracts\Address as AddressContract;
use App\Containers\MarketPalace\Address\Enums\AddressType;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Ship\Utils\CastsEnums;

/**
 * Address Entity class
 *
 * @property int $id
 * @property string $name
 * @property AddressType|null $type
 * @property string $country_id
 * @property int|null $province_id
 * @property string|null $postalcode     Max 12 characters
 * @property string|null $city
 * @property string $address
 * @property-read Country $country
 * @property-read null|Province $province
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \App\Containers\MarketPalace\Address\Data\Factories\AddressFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostalcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 */
class Address extends ParentModel implements AddressContract
{
    use CastsEnums;

    protected $fillable = [];

    protected $hidden = [];

    protected $casts = [];

    protected $guarded = ['id'];

    protected $enums = [
        'type' => AddressType::class
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'addresses';

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Address';

    public function country(): BelongsTo
    {
        return $this->belongsTo(CountryProxy::modelClass(), 'country_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(ProvinceProxy::modelClass(), 'province_id');
    }
}
