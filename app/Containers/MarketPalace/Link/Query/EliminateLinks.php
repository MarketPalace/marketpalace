<?php

declare(strict_types=1);

/**
 * Contains the EliminateLinks class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Query;

use Illuminate\Database\Eloquent\Model;
use App\Containers\MarketPalace\Link\Contracts\LinkType;
use App\Containers\MarketPalace\Link\Models\LinkGroup;
use App\Containers\MarketPalace\Link\Models\LinkGroupItemProxy;

final class EliminateLinks
{
    use HasBaseModel;
    use FindsDesiredLinkGroups;

    public function __construct(
        private LinkType $type
    ) {
    }

    public function and(Model ...$models): void
    {
        $toRemove = collect($models);
        /** @var LinkGroup $group */
        foreach ($this->linkGroupsOfModel($this->baseModel) as $group) {
            $itemsToDelete = $group
                ->items
                ->filter(fn ($item) => $toRemove->contains(function ($modelToRemove) use ($item) {
                    return $modelToRemove->id == $item->linkable_id &&
                        $modelToRemove::class === $item->linkable_type;
                }));
            LinkGroupItemProxy::destroy($itemsToDelete->map->id);
        }
    }
}
