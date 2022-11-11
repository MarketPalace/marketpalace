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

interface Carrier
{
    public function name(): string;
}
