<?php

declare(strict_types=1);

/**
 * Contains the NormalizesLinkType trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Traits;

use InvalidArgumentException;
use App\Containers\MarketPalace\Link\Contracts\LinkType;
use App\Containers\MarketPalace\Link\Models\LinkTypeProxy;

trait NormalizesLinkType
{
    private array $linkTypeCache = [];

    private function normalizeLinkTypeModel(LinkType|string $type): LinkType
    {
        $slug = is_string($type) ? $type : $type->slug;

        if (!isset($this->linkTypeCache[$slug])) {
            $this->linkTypeCache[$slug] = is_string($type) ? LinkTypeProxy::findBySlug($type) : $type;
        }

        if (null === $this->linkTypeCache[$slug]) {
            throw new InvalidArgumentException("There is no link type with `$slug` slug");
        }

        return $this->linkTypeCache[$slug];
    }
}
