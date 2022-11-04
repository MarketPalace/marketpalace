<?php

declare(strict_types=1);

/**
 * Contains the LinkTypeProxy class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Models;

use App\Ship\Proxies\ModelProxy;
use App\Containers\MarketPalace\Link\Contracts\LinkType as LinkTypeContract;

/**
 * @method static LinkTypeContract|null findBySlug(string $slug)
 */
class LinkTypeProxy extends ModelProxy
{
}
