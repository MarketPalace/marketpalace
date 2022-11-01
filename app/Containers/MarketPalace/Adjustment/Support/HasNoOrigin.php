<?php

declare(strict_types=1);

/**
 * Contains the HasNoOrigin trait.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Support;

trait HasNoOrigin
{
    public function getOrigin(): ?string
    {
        return null;
    }
}
