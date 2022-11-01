<?php

declare(strict_types=1);

/**
 * Contains the IsACharge trait.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Support;

trait IsACharge
{
    public function isCredit(): bool
    {
        return false;
    }

    public function isCharge(): bool
    {
        return true;
    }
}
