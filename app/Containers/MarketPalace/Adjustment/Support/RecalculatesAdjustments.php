<?php

declare(strict_types=1);

/**
 * Contains the RecalculatesAdjustments trait.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Support;

use App\Containers\MarketPalace\Adjustment\Contracts\Adjustment;

/**
 * Only apply this trait on an adjustable!
 */
trait RecalculatesAdjustments
{
    public function recalculateAdjustments(): void
    {
        /** @var Adjustment $adjustment */
        foreach ($this->adjustments() as $adjustment) {
            $adjustment->getAdjuster()->recalculate($adjustment, $this);
        }
    }
}
