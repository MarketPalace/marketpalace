<?php

declare(strict_types=1);

/**
 * Contains the PropertyProxy class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Property\Models;

use Illuminate\Support\Collection;
use App\Ship\Proxies\ModelProxy;
use App\Containers\MarketPalace\Property\Contracts\PropertyType;

/**
 * @method static PropertyType getType()
 * @method static Collection values()
 * @method static \App\Containers\MarketPalace\Property\Contracts\Property|null findBySlug(string $slug)
 */
class PropertyProxy extends ModelProxy
{
}
