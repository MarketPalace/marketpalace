<?php

declare(strict_types=1);

/**
 * Contains the SimpleShippingFee class.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Adjusters;

use App\Containers\MarketPalace\Adjustment\Contracts\Adjustable;
use App\Containers\MarketPalace\Adjustment\Contracts\Adjuster;
use App\Containers\MarketPalace\Adjustment\Contracts\Adjustment;
use App\Containers\MarketPalace\Adjustment\Models\AdjustmentProxy;
use App\Containers\MarketPalace\Adjustment\Models\AdjustmentTypeProxy;
use App\Containers\MarketPalace\Adjustment\Support\HasWriteableTitleAndDescription;
use App\Containers\MarketPalace\Adjustment\Support\IsLockable;
use App\Containers\MarketPalace\Adjustment\Support\IsNotIncluded;

final class SimpleShippingFee implements Adjuster
{
    use HasWriteableTitleAndDescription;
    use IsLockable;
    use IsNotIncluded;

    private float $amount;

    private ?float $freeThreshold;

    public function __construct(float $amount, ?float $freeThreshold = null)
    {
        $this->amount = $amount;
        $this->freeThreshold = $freeThreshold;
    }

    public static function reproduceFromAdjustment(Adjustment $adjustment): Adjuster
    {
        $data = $adjustment->getData();

        return new self(floatval($data['amount'] ?? 0), $data['freeThreshold'] ?? null);
    }

    public function createAdjustment(Adjustable $adjustable): Adjustment
    {
        $adjustmentClass = AdjustmentProxy::modelClass();

        return new $adjustmentClass($this->getModelAttributes($adjustable));
    }

    public function recalculate(Adjustment $adjustment, Adjustable $adjustable): Adjustment
    {
        $adjustment->setAmount($this->calculateAmount($adjustable));

        return $adjustment;
    }

    private function calculateAmount(Adjustable $adjustable): float
    {
        if (null !== $this->freeThreshold && $adjustable->itemsTotal() >= $this->freeThreshold) {
            return 0;
        }

        return $this->amount;
    }

    private function getModelAttributes(Adjustable $adjustable): array
    {
        return [
            'type' => AdjustmentTypeProxy::SHIPPING(),
            'adjuster' => self::class,
            'origin' => null,
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'data' => ['amount' => $this->amount, 'freeThreshold' => $this->freeThreshold],
            'amount' => $this->calculateAmount($adjustable),
            'is_locked' => $this->isLocked(),
            'is_included' => $this->isIncluded(),
        ];
    }
}
