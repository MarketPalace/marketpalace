<?php

declare(strict_types=1);

/**
 * Contains the CheckoutSubject interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Contracts\MarketPalace;

use Illuminate\Support\Collection;

/**
 * This one is typically a (readonly) cart
 */
interface CheckoutSubject
{
    /**
     * A collection of CheckoutSubjectItem objects
     */
    public function getItems(): Collection;

    /**
     * Returns the final total of the CheckoutSubject (typically a cart)
     */
    public function total(): float;
}
