<?php

declare(strict_types=1);

/**
 * Contains the Dimension interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Contracts\MarketPalace;

interface Dimension
{
    public function width(): float;

    public function height(): float;

    public function length(): float;
}
