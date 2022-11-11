<?php

declare(strict_types=1);

/**
 * Contains the Carrier interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Shipment\Contracts;

use App\Ship\Contracts\MarketPalace\Address;

interface Shipment
{
    public function deliveryAddress(): Address;

    public function status(): ShipmentStatus;

    public function getCarrier(): ?Carrier;
}
