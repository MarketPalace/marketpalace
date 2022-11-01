<?php

declare(strict_types=1);

/**
 * Contains the Adjuster interface.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Contracts;

interface Adjuster
{
    public static function reproduceFromAdjustment(Adjustment $adjustment): Adjuster;

    public function createAdjustment(Adjustable $adjustable): Adjustment;

    public function recalculate(Adjustment $adjustment, Adjustable $adjustable): Adjustment;
}
