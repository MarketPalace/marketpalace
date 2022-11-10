<?php

declare(strict_types=1);

/**
 * Contains the BillPayer interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Order\Contracts;

interface OrderNumberGenerator
{
    /**
     * Generates and returns a new order number.
     *
     * @param Order|null $order
     *
     * @return string
     */
    public function generateNumber(Order $order = null): string;
}
