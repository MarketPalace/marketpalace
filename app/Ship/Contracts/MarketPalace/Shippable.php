<?php

declare(strict_types=1);

/**
 * Contains the Shippable interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Contracts\MarketPalace;

interface Shippable
{
    public function getShippingAddress(): ?Address;

    public function weight(): float;

    public function weightUnit(): string;

    public function dimension(): ?Dimension;
}
