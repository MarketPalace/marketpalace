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

use App\Ship\Utils\Enum;

interface PaymentResponse
{
    public function wasSuccessful(): bool;

    public function getMessage(): ?string;

    public function getTransactionId(): ?string;

    public function getAmountPaid(): ?float;

    public function getPaymentId(): string;

    public function getStatus(): PaymentStatus;

    public function getNativeStatus(): Enum;
}
