<?php

declare(strict_types=1);

/**
 * Contains the LinkGroupItem class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use MarketPalace\Links\Contracts\LinkGroupItem as LinkGroupItemContract;

/**
 * @property int $id
 * @property int $link_group_id
 * @property int $linkable_id
 * @property string $linkable_type
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read LinkGroup $group
 *
 * @method static LinkGroupItem create(array $attributes)
 */
class LinkGroupItem extends Model implements LinkGroupItemContract
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(LinkGroupProxy::modelClass(), 'link_group_id');
    }

    public function linkable(): MorphTo
    {
        return $this->morphTo();
    }
}
