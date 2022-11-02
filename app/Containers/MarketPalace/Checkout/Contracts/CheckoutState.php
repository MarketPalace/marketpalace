<?php

declare(strict_types=1);

/**
 * Contains the CheckoutState interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Checkout\Contracts;

interface CheckoutState
{
    /**
     * Returns whether the state represents a state where the checkout can be submitted
     */
    public function canBeSubmitted(): bool;

    /**
     * Returns an array of states that represent a checkout state that is ready to be submitted
     */
    public static function getSubmittableStates(): array;
}
