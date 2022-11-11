<?php

declare(strict_types=1);

/**
 * Contains the BasePaymentEvent class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MArketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Events;

use App\Containers\MarketPalace\Payment\Contracts\Payment;

trait HasPayment
{
    protected Payment $payment;

    public function getPayment(): Payment
    {
        return $this->payment;
    }
}
