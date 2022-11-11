<?php

declare(strict_types=1);

/**
 * Contains the NullResponse class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace/Payment
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Responses;

use App\Containers\MarketPalace\Payment\Contracts\PaymentResponse;
use App\Containers\MarketPalace\Payment\Contracts\PaymentStatus;
use App\Containers\MarketPalace\Payment\Enums\PaymentStatusProxy;
use App\Ship\Utils\Enum;

class NullResponse implements PaymentResponse
{
    public function wasSuccessful(): bool
    {
        return true;
    }

    public function getMessage(): ?string
    {
        return null;
    }

    public function getTransactionId(): ?string
    {
        return null;
    }

    public function getAmountPaid(): ?float
    {
        return null;
    }

    public function getPaymentId(): string
    {
        return '';
    }

    public function getStatus(): PaymentStatus
    {
        return PaymentStatusProxy::create(); // Returns the default value of the enum
    }

    public function getNativeStatus(): Enum
    {
        return NullStatus::create();
    }
}
