<?php

declare(strict_types=1);

/**
 * Contains the Eliminate class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Query;

use App\Containers\MarketPalace\Link\Contracts\LinkType;

final class Eliminate
{
    use HasPrivateLinkTypeBasedConstructor;

    public static function the(LinkType|string $type): self
    {
        return new self($type);
    }

    public function link(): EliminateLinks
    {
        return new EliminateLinks($this->type);
    }

    public function group(): EliminateLinkGroup
    {
        return new EliminateLinkGroup($this->type);
    }
}
