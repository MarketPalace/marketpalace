<?php

declare(strict_types=1);

/**
 * Contains the BelongsToACustomer trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Containers\MarketPalace\Customer\Contracts\Customer;
use App\Containers\MarketPalace\Customer\Models\CustomerProxy;

/**
 * @property int $customer_id
 * @property Customer|null $customer
 */
trait BelongsToACustomer
{
    public function customer(): BelongsTo
    {
        return $this->belongsTo(CustomerProxy::modelClass(), 'customer_id', 'id');
    }
}
