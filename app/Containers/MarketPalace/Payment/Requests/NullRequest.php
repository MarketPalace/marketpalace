<?php

declare(strict_types=1);

/**
 * Contains the NullRequest class.
 *
 * @copyright   Copyright (c) 2020 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Requests;

use App\Containers\MarketPalace\Payment\Contracts\Payment;
use App\Containers\MarketPalace\Payment\Contracts\PaymentRequest;

class NullRequest implements PaymentRequest
{
    private Payment $payment;

    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    public function getHtmlSnippet(array $options = []): ?string
    {
        return '';
    }

    public function willRedirect(): bool
    {
        return false;
    }
}
