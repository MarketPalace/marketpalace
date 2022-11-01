<?php

declare(strict_types=1);

/**
 * Contains the HasAdjustmentsViaRelation trait.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Support;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Containers\MarketPalace\Adjustment\Contracts\AdjustmentCollection;
use App\Containers\MarketPalace\Adjustment\Models\Adjustment;

trait HasAdjustmentsViaRelation
{
    protected ?RelationAdjustmentCollection $adjustmentCollection = null;

    public function adjustmentsRelation(): MorphMany
    {
        return $this->morphMany(Adjustment::class, 'adjustable');
    }

    public function adjustments(): AdjustmentCollection
    {
        if (null === $this->adjustmentCollection) {
            $this->adjustmentCollection = new RelationAdjustmentCollection($this);
        }

        return $this->adjustmentCollection;
    }
}
