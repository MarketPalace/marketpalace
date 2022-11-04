<?php

declare(strict_types=1);

/**
 * Contains the Linkable trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Containers\MarketPalace\Link\Contracts\LinkType;
use App\Containers\MarketPalace\Link\Models\LinkGroupItemProxy;

/**
 * @property-read Collection $includedInLinkGroupItems
 */
trait Linkable
{
    use NormalizesLinkType;

    /**
     * Returns the models (other linkables) that are linked to this model with
     * the given link type. Since there can be multiple groups of the given
     * type, an optional property id can be passed, to further filter by
     */
    public function links(LinkType|string $type, $propertyId = null): Collection
    {
        $type = $this->normalizeLinkTypeModel($type);

        // @todo Optimize this to a single query
        $result = Collection::make();
        foreach ($this->linkGroups()->filter(fn ($group) => $group->type->id === $type->id) as $group) {
            $result->push(
                ...$group
                ->items
                ->map
                ->linkable
                ->reject(fn ($item) => $item->id === $this->id)
            );
        }

        return $result;
    }

    public function linkGroups(): Collection
    {
        return $this->includedInLinkGroupItems()->get()->transform(fn ($item) => $item->group);
    }

    public function includedInLinkGroupItems(): MorphMany
    {
        return $this->morphMany(LinkGroupItemProxy::modelClass(), 'linkable');
    }
}
