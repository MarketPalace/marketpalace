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

use App\Containers\MarketPalace\Payment\Enums\PaymentStatus;

interface PaymentEventMap
{
    public function ifCurrentStatusIs(PaymentStatus $status): self;

    public function andOldStatusIs(PaymentStatus $status): self;

    public function thenFireEvents(): array;
}
