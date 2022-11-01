<?php
/**
 * Contains the Address model class.
 *
 * @copyright   Copyright (c) 2016 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Models;

use App\Containers\MarketPalace\Address\Contracts\Address as AddressContract;
use App\Containers\MarketPalace\Address\Models\Province;
use App\Containers\MarketPalace\Address\Models\Country;
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
 *
 * @property-read Country $country
 * @property-read null|Province $province
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
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
