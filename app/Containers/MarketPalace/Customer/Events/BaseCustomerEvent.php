<?php
/**
 * Contains the BaseCustomerEvent class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Events;

use App\Containers\MarketPalace\Customer\Contracts\CustomerAwareEvent;

class BaseCustomerEvent implements CustomerAwareEvent
{
    use HasCustomer;

    public function __construct($customer)
    {
        $this->customer = $customer;
    }
}
