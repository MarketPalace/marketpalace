<?php

declare(strict_types=1);

/**
 * Contains the FindsDesiredLinkGroups trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Query;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Containers\MarketPalace\Link\Models\LinkGroupItemProxy;

trait FindsDesiredLinkGroups
{
    use HasPropertyFilter;

    protected function linkGroupsOfModel(Model $model): Collection
    {
        $groups = $model
            ->morphMany(LinkGroupItemProxy::modelClass(), 'linkable')
            ->get()
            ->transform(fn ($item) => $item->group)
            ->filter(fn ($group) => $group?->type->id === $this->type->id);

        if ($this->hasPropertyFilter()) {
            $groups = $groups->filter(fn ($group) => $group->property_id == $this->propertyId());
        }

        return $groups;
    }
}
