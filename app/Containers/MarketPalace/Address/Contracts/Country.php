<?php
/**
 * Contains the Country interface.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface Country
{
    public function provinces(): HasMany;
}
