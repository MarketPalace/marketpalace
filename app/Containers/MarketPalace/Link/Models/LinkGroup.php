<?php

declare(strict_types=1);

/**
 * Contains the LinkGroup class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Models;

use Illuminate\Database\Eloquent\Collection;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use App\Containers\MarketPalace\Link\Contracts\LinkGroup as LinkGroupContract;

/**
 *
 * @property int $id
 * @property int $link_type_id
 * @property int|null $property_id
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read LinkType $type
 * @property-read Collection $items
 *
 * @method static LinkGroup create(array $attributes)
 */
class LinkGroup extends ParentModel implements LinkGroupContract
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'property_id' => 'integer',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'LinkGroup';

    public function type(): BelongsTo
    {
        return $this->belongsTo(LinkTypeProxy::modelClass(), 'link_type_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(LinkGroupItemProxy::modelClass(), 'link_group_id', 'id');
    }
}
