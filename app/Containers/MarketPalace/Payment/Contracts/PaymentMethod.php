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

interface PaymentMethod
{
    public const DEFAULT_TIMEOUT = 600;

    /**
     * Time in seconds after an initiated payment request is being considered as timed out
     *
     * @return int
     */
    public function getTimeout(): int;

    public function getGateway(): PaymentGateway;

    public function getConfiguration(): array;

    public function isEnabled(): bool;

    public function getName(): string;
}
