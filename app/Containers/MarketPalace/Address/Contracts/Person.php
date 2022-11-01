<?php
/**
 * Contains the Person interface.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Contracts;

interface Person
{
    /**
     * Returns the full name of the person (in appropriate name order)
     */
    public function getFullName(): string;
}
