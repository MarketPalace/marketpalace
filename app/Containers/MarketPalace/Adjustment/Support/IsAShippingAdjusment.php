<?php

declare(strict_types=1);

/**
 * Contains the IsAShippingAdjusment trait.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Support;

use App\Containers\MarketPalace\Adjustment\Contracts\AdjustmentType;
use App\Containers\MarketPalace\Adjustment\Enums\AdjustmentTypeProxy;

trait IsAShippingAdjusment
{
    private ?AdjustmentType $type = null;

    public function getType(): AdjustmentType
    {
        if (null === $this->type) {
            $this->type = AdjustmentTypeProxy::SHIPPING();
        }

        return $this->type;
    }
}
