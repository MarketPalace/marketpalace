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

use MarketPalace\Payment\Contracts\Payment;

class PaymentPartiallyReceived extends BasePaymentEvent
{
    public float $amountPaid;

    public function __construct(Payment $payment, float $amountPaid)
    {
        parent::__construct($payment);
        $this->amountPaid = $amountPaid;
    }
}
