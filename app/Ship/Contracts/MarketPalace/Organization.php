<?php

declare(strict_types=1);

/**
 * Contains the Organization interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Contracts\MarketPalace;

interface Organization extends Contactable
{
    /**
     * Returns the Company name
     */
    public function getCompanyName(): ?string;

    /**
     * Customer's tax number (VAT id, tax id, etc)
     */
    public function getTaxNumber(): ?string;
}
