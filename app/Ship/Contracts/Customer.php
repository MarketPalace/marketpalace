<?php

declare(strict_types=1);

/**
 * Contains the Customer interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Contracts;

interface Customer extends Organization, Person
{
    /**
     * Returns the name of the customer (either company or person's name)
     */
    public function getName(): string;

    /**
     * Returns whether the client is an organization (company, GO, NGO, foundation, etc)
     */
    public function isOrganization(): bool;

    /**
     * Returns whether the client is a natural person
     */
    public function isIndividual(): bool;
}
