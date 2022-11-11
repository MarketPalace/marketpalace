<?php

declare(strict_types=1);

/**
 * Contains the BelongsToCarrier trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Shipment\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Containers\MarketPalace\Shipment\Contracts\Carrier;
use App\Containers\MarketPalace\Shipment\Models\CarrierProxy;

/**
 * @property-read null|Carrier $carrier
 */
trait BelongsToCarrier
{
    public function getCarrier(): ?Carrier
    {
        return $this->carrier;
    }

    public function carrier(): BelongsTo
    {
        return $this->belongsTo(CarrierProxy::modelClass(), 'carrier_id', 'id');
    }
}
