<?php

declare(strict_types=1);

/**
 * Contains the Adjustable interface.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Adjustable
{
    public function itemsTotal(): float;

    public function adjustments(): AdjustmentCollection;

    public function adjustmentsRelation(): MorphMany;

    public function recalculateAdjustments(): void;
}
