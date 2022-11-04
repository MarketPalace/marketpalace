<?php

declare(strict_types=1);

/**
 * Contains the EliminateLinkGroup class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Query;

use Illuminate\Database\Eloquent\Model;
use App\Containers\MarketPalace\Link\Contracts\LinkType;
use App\Containers\MarketPalace\Link\Models\LinkGroupProxy;

class EliminateLinkGroup
{
    use FindsDesiredLinkGroups;

    public function __construct(
        private LinkType $type
    ) {
    }

    public function of(Model $model): void
    {
        LinkGroupProxy::destroy($this->linkGroupsOfModel($model)->map->id);
    }
}
