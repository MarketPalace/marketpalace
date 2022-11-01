<?php

declare(strict_types=1);

/**
 * Contains the CheckoutSubjectItem interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Contracts\MarketPalace;

interface CheckoutSubjectItem
{
    /**
     * Returns the buyable (product) of the item
     */
    public function getBuyable(): Buyable;

    /**
     * Returns the quantity of the line
     */
    public function getQuantity(): int;

    /**
     * Returns the (adjusted) line total
     */
    public function total(): float;
}
