<?php
/**
 * Contains the HasCustomer trait.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Events;

use App\Containers\MarketPalace\Customer\Contracts\Customer;

trait HasCustomer
{
    /** @var  Customer */
    protected Customer $customer;

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }
}
