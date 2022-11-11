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

use App\Ship\Contracts\MarketPalace\Payable;

interface Payment
{
    public function getPaymentId(): string;

    public function getAmount(): float;

    public function getCurrency(): string;

    // "Transaction amount" would've been a better name
    // since the value returned here might represent
    // an amount of a full/partial refund as well
    public function getAmountPaid(): float;

    public function getStatus(): PaymentStatus;

    public function getMethod(): PaymentMethod;

    public function getPayable(): Payable;

    public function getExtraData(): array;
}
