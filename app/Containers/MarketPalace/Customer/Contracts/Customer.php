<?php
/**
 * Contains the Customer interface.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Contracts;

interface Customer
{
    /**
     * Returns the name of the customer (either company or person's name)
     *
     * @return string
     */
    public function getName(): string;
}
