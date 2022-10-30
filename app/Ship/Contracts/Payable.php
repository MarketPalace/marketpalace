<?php

declare(strict_types=1);

/**
 * Contains the Payable interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Contracts;

interface Payable
{
    public function getPayableId(): string;

    public function getPayableType(): string;

    public function getAmount(): float;

    public function getCurrency(): string;

    public function getBillPayer(): ?BillPayer;

    /** The human-readable representation, eg.: "Order no. ABC-123" */
    public function getTitle(): string;
}
