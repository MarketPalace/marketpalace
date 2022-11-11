<?php

declare(strict_types=1);

/**
 * Contains the ReplacesPaymentUrlParameters trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace/Payment
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Traits;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Containers\MarketPalace\Payment\Contracts\Payment;

trait ReplacesPaymentUrlParameters
{
    private function replaceUrlParameters(string $url, Payment $payment): string
    {
        $substitutions = [
            'paymentId' => $payment->getPaymentId(),
            'payableId' => $payment->getPayable()->getPayableId(),
        ];

        $result = $url;
        foreach ($substitutions as $param => $replacement) {
            $result = str_replace('{' . $param . '}', $replacement, $result);
        }

        if (!Str::startsWith($result, 'http')) {
            $result = URL::to($result);
        }

        return $result;
    }
}
