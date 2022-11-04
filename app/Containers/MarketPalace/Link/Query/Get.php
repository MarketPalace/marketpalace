<?php

declare(strict_types=1);

/**
 * Contains the Get class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Query;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Containers\MarketPalace\Link\Contracts\LinkType;

final class Get
{
    use HasPrivateLinkTypeBasedConstructor;
    use FindsDesiredLinkGroups;
    use WantsLinksOrGroups;

    public static function __callStatic($name, $arguments)
    {
        return self::the($name);
    }

    public static function the(LinkType|string $type): self
    {
        return new self($type);
    }

    public function of(Model $model): Collection
    {
        $groups = $this->linkGroupsOfModel($model);

        if ('groups' === $this->wants) {
            return $groups;
        }

        $links = collect();
        $groups->each(function ($group) use ($links, $model) {
            $links->push(
                ...$group
                ->items
                ->map
                ->linkable
                ->reject(fn ($item) => $item->id === $model->id)
            );
        });

        return $links;
    }
}
