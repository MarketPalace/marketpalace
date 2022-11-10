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

interface OrderStatus
{
    /**
     * Returns whether the status represents an open state
     *
     * @return boolean
     */
    public function isOpen(): bool;

    /**
     * Returns an array of statuses that represent an open order state
     *
     * @return array
     */
    public static function getOpenStatuses(): array;
}
