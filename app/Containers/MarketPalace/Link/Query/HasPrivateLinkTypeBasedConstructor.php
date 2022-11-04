<?php

declare(strict_types=1);

/**
 * Contains the HasPrivateLinkTypeBasedConstructor trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Query;

use App\Containers\MarketPalace\Link\Contracts\LinkType;
use App\Containers\MarketPalace\Link\Traits\NormalizesLinkType;

trait HasPrivateLinkTypeBasedConstructor
{
    use NormalizesLinkType;

    protected LinkType $type;

    private function __construct(LinkType|string $type)
    {
        $this->type = $this->normalizeLinkTypeModel($type);
    }
}
