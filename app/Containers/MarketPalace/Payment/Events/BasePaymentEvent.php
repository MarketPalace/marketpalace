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
use App\Containers\MarketPalace\Payment\Contracts\PaymentEvent;

class BasePaymentEvent implements PaymentEvent
{
    use HasPayment;

    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }
}
