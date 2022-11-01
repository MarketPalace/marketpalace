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

use App\Containers\MarketPalace\Adjustment\Enums\AdjustmentType;

trait IsAShippingAdjusment
{
    private ?AdjustmentType $type = null;

    public function getType(): AdjustmentType
    {
        if (null === $this->type) {
            $this->type = AdjustmentType::SHIPPING();
        }

        return $this->type;
    }
}
