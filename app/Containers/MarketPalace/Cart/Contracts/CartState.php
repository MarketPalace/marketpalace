<?php

declare(strict_types=1);

/**
 * Contains the CartState interface.
 *
 * @copyright   Copyright (c) 2018 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Cart\Contracts;

interface CartState
{
    /**
     * Returns whether the cart's state represents an active state
     *
     * @return bool
     */
    public function isActive(): bool;

    /**
     * Returns the array of active states
     *
     * @return array
     */
    public static function getActiveStates(): array;
}
