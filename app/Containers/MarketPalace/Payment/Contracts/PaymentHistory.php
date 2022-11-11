<?php

declare(strict_types=1);

/**
 * Contains the Payment interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Contracts;

interface PaymentHistory
{
    public static function begin(Payment $payment): PaymentHistory;

    public static function addPaymentResponse(
        Payment $payment,
        PaymentResponse $response,
        PaymentStatus $oldStatus = null
    ): PaymentHistory;
}
