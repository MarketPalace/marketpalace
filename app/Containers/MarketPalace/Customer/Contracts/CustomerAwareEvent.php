<?php
/**
 * Contains the CustomerAwareEvent interface.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Contracts;

interface CustomerAwareEvent
{
    public function getCustomer(): Customer;
}
