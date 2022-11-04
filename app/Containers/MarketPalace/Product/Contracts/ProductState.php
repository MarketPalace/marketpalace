<?php

declare(strict_types=1);

/**
 * Contains the ProductState enum interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalce
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Product\Contracts;

interface ProductState
{
    /**
     * Returns whether the state represents an active state
     *
     * @return boolean
     */
    public function isActive(): bool;

    /**
     * Returns an array of states that represent an active product state
     *
     * @return array
     */
    public static function getActiveStates(): array;
}
