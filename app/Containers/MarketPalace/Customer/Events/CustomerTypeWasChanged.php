<?php
/**
 * Contains the CustomerTypeWasChanged class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Events;

use App\Containers\MarketPalace\Customer\Contracts\Customer;
use App\Containers\MarketPalace\Customer\Contracts\CustomerType;

class CustomerTypeWasChanged extends BaseCustomerEvent
{
    /** @var  CustomerType */
    public CustomerType $fromType;

    public array $oldAttributes = [];

    /**
     * CustomerTypeWasChanged constructor.
     *
     * @param Customer     $customer
     * @param CustomerType $fromType
     * @param  array  $oldAttributes
     */
    public function __construct(Customer $customer, CustomerType $fromType, array $oldAttributes)
    {
        parent::__construct($customer);

        $this->fromType      = $fromType;
        $this->oldAttributes = $oldAttributes;
    }
}
