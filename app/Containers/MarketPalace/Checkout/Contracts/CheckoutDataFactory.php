<?php

declare(strict_types=1);

/**
 * Contains the CheckoutDataFactory interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Checkout\Contracts;

use App\Ship\Contracts\MarketPalace\Address;
use App\Ship\Contracts\MarketPalace\BillPayer;

interface CheckoutDataFactory
{
    public function createBillPayer(): BillPayer;

    public function createShippingAddress(): Address;
}
