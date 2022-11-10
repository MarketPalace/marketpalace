<?php

declare(strict_types=1);

/**
 * Contains the BillPayer interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Order\Contracts;

use Traversable;
use App\Ship\Contracts\MarketPalace\Address;

interface Order
{
    public function getNumber(): ?string;

    public function getStatus(): OrderStatus;

    public function getBillPayer(): ?BillPayer;

    public function getShippingAddress(): ?Address;

    public function getItems(): Traversable;

    /**
     * Returns the final total of the Order
     *
     * @return float
     */
    public function total();
}
