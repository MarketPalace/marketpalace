<?php

declare(strict_types=1);

/**
 * Contains the Property interface.
 *
 * @copyright   Copyright (c) 2018 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Property\Contracts;

interface PropertyValue
{
    /**
     * Returns the transformed value according to the underlying type
     */
    public function getCastedValue();
}
