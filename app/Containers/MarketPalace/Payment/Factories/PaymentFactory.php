<?php

declare(strict_types=1);

/**
 * Contains the PaymentFactory class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Factories;

use App\Ship\Contracts\MarketPalace\Payable;
use App\Containers\MarketPalace\Payment\Contracts\Payment;
use App\Containers\MarketPalace\Payment\Contracts\PaymentMethod;
use App\Containers\MarketPalace\Payment\Events\PaymentCreated;
use App\Containers\MarketPalace\Payment\Models\PaymentProxy;

class PaymentFactory
{
    public static function createFromPayable(
        Payable $payable,
        PaymentMethod $paymentMethod,
        array $extraData = []
    ): Payment {
        $payment = PaymentProxy::create([
            'amount' => $payable->getAmount(),
            'currency' => $payable->getCurrency(),
            'payable_type' => $payable->getPayableType(),
            'payable_id' => $payable->getPayableId(),
            'payment_method_id' => $paymentMethod->id,
            'data' => $extraData
        ]);

        event(new PaymentCreated($payment));

        return $payment;
    }
}
