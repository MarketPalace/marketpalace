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

interface OrderFactory
{
    /**
     * Creates a new order from simple data arrays
     *
     * @param array $data
     * @param array $items
     *
     * @return Order
     */
    public function createFromDataArray(array $data, array $items): Order;
}
