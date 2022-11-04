<?php

declare(strict_types=1);

/**
 * Contains the CustomerIsOptional trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Traits;

trait CustomerIsOptional
{
    public function isAssociatedWithACustomer(): bool
    {
        return null !== $this->customer_id;
    }

    public function isNotAssociatedWithACustomer(): bool
    {
        return !$this->isAssociatedWithACustomer();
    }
}
