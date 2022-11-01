<?php

declare(strict_types=1);

/**
 * Contains the HasWriteableAdjustable trait.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Support;

use App\Containers\MarketPalace\Adjustment\Contracts\Adjustable;

trait HasWriteableAdjustable
{
    private Adjustable $adjustable;

    public function getAdjustable(): Adjustable
    {
        return $this->adjustable;
    }

    public function setAdjustable(Adjustable $adjustable): void
    {
        $this->adjustable = $adjustable;
    }
}
