<?php

declare(strict_types=1);

/**
 * Contains the BaseOrderEvent class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Order\Events;

use App\Containers\MarketPalace\Order\Contracts\Order;

trait HasOrder
{
    /** @var  Order */
    protected Order $order;

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }
}
