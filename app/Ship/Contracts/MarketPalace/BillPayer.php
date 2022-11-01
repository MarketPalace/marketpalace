<?php

declare(strict_types=1);

/**
 * Contains the BillPayer interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Contracts\MarketPalace;

/**
 * A customer (either an organization or an individual person) that receives an Invoice.
 */
interface BillPayer extends Customer
{
    /**
     * Returns whether the customer is registered in the EU
     */
    public function isEuRegistered(): bool;

    /**
     * Returns the billing address
     */
    public function getBillingAddress(): Address;
}
