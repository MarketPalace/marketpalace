<?php

declare(strict_types=1);

/**
 * Contains the Person interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Contracts;

interface Person extends Contactable
{
    /**
     * Returns the first name of the person
     */
    public function getFirstName(): ?string;

    /**
     * Returns the last name of the person
     */
    public function getLastName(): ?string;

    /**
     * Returns the full name of the person (in appropriate name order)
     */
    public function getFullName(): string;
}
