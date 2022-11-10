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
use App\Containers\MarketPalace\Order\Contracts\OrderAwareEvent;

abstract class BaseOrderEvent implements OrderAwareEvent
{
    use HasOrder;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}
