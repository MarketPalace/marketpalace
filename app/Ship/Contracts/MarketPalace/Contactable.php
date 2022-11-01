<?php

declare(strict_types=1);

/**
 * Contains the Contactable interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Contracts\MarketPalace;

interface Contactable
{
    public function getEmail(): ?string;

    public function getPhone(): ?string;
}
