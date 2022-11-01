<?php

declare(strict_types=1);

/**
 * Contains the IsNotIncluded trait.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Support;

trait IsNotIncluded
{
    public function isIncluded(): bool
    {
        return false;
    }
}
