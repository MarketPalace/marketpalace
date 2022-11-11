<?php

declare(strict_types=1);

/**
 * Contains the PaymentHistoryProxy class.
 *
 * @copyright   Copyright (c) 2020 Aboozar Ghaffari
 * @package     MarketPalace/Payment
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Models;

use App\Ship\Proxies\ModelProxy;

/**
 * @method static \App\Containers\MarketPalace\Payment\Contracts\PaymentHistory begin(Payment $payment);
 * @method static \App\Containers\MarketPalace\Payment\Contracts\PaymentHistory addPaymentResponse(\App\Containers\MarketPalace\Payment\Contracts\Payment $payment, \App\Containers\MarketPalace\Payment\Contracts\PaymentResponse $response, \App\Containers\MarketPalace\Payment\Contracts\PaymentStatus $oldStatus = null)
 */
class PaymentHistoryProxy extends ModelProxy
{
}
