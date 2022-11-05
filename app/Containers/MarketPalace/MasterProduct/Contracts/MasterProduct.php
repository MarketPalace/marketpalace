<?php

declare(strict_types=1);

/**
 * Contains the MasterProduct interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\MasterProduct\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use App\Containers\MarketPalace\Product\Contracts\Product;

/**
 * @property-read Collection|MasterProductVariant[] $variants
 */
interface MasterProduct extends Product
{
    public function variants(): HasMany;

    public function createVariant(array $attributes): MasterProductVariant;
}
