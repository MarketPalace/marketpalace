<?php

declare(strict_types=1);

/**
 * Contains the Product interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalce
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Product\Contracts;

interface Product
{
    /**
     * Returns whether the product is active (based on its state)
     *
     * @return bool
     */
    public function isActive(): bool;

    /**
     * Returns the title of the product. If no `title` was given, returns the `name` of the product
     *
     * @return string
     */
    public function title(): string;
}
