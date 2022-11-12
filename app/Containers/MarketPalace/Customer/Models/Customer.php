<?php
/**
 * Contains the Customer model class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Models;

use App\Containers\MarketPalace\Customer\Contracts\CustomerType;
use Carbon\Carbon;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Containers\MarketPalace\Address\Models\Address;
use App\Containers\MarketPalace\Address\Models\Organization;
use App\Containers\MarketPalace\Address\Models\Person;
use App\Containers\MarketPalace\Customer\Contracts\Customer as CustomerContract;
use App\Containers\MarketPalace\Customer\Events\CustomerTypeWasChanged;
use App\Containers\MarketPalace\Customer\Events\CustomerWasCreated;
use App\Containers\MarketPalace\Customer\Events\CustomerWasUpdated;
use App\Ship\Utils\CastsEnums;

/**
 * @property int $id
 * @property CustomerType $type
 * @property string $email
 * @property string $phone
 * @property string $firstname
 * @property string $lastname
 * @property string $company_name
 * @property string $name
 * @property string $tax_nr
 * @property string $registration_nr
 * @property string $currency
 * @property string $timezone
 * @property Organization|null $organization
 * @property Person|null $person
 * @property bool $is_active
 * @property float $ltv
 * @property Carbon|null $last_purchase_at
 *
 * @method static Customer create(array $attributes)
 */
class Customer extends ParentModel implements CustomerContract
{
    use CastsEnums;

    protected $table = 'customers';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'is_active'        => 'boolean',
        'last_purchase_at' => 'datetime',
        'ltv'              => 'float',
    ];

    protected $enums = [
        'type' => 'CustomerTypeProxy@enumClass',
    ];

    protected $fillable = [];

    protected $hidden = [];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Customer';

    protected $dispatchesEvents = [
        'created' => CustomerWasCreated::class,
        'updated' => CustomerWasUpdated::class,
    ];

    public function getName(): string
    {
        if ($this->type->isOrganization()) {
            return $this->company_name;
        }

        return sprintf('%s %s', $this->firstname, $this->lastname);
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::modelClass());
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::modelClass());
    }

    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(Address::modelClass(), 'customer_addresses');
    }

    protected function getNameAttribute()
    {
        return $this->getName();
    }

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($customer) {
            if ($customer->original['type'] != $customer->type) {
                event(
                    new CustomerTypeWasChanged(
                        $customer,
                        CustomerType::create($customer->original['type']),
                        $customer->original
                    )
                );
            }
        });
    }
}
