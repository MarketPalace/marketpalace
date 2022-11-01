<?php

declare(strict_types=1);

/**
 * Contains the SimpleDiscount class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
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

final class SimpleDiscount implements Adjuster
{
    use HasWriteableTitleAndDescription;
    use IsLockable;
    use IsNotIncluded;

    private float $amount;

    private ?float $threshold;

    public function __construct(float $amount, ?float $threshold = null)
    {
        $this->amount = $amount;
        $this->threshold = $threshold;
    }

    public static function reproduceFromAdjustment(Adjustment $adjustment): Adjuster
    {
        $data = $adjustment->getData();

        return new self(floatval($data['amount'] ?? 0), $data['threshold'] ?? null);
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
        if (null !== $this->threshold && $adjustable->itemsTotal() <= $this->threshold) {
            return 0;
        }

        return -1 * $this->amount;
    }

    private function getModelAttributes(Adjustable $adjustable): array
    {
        return [
            'type' => AdjustmentTypeProxy::PROMOTION(),
            'adjuster' => self::class,
            'origin' => null,
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'data' => ['amount' => $this->amount, 'freeThreshold' => $this->threshold],
            'amount' => $this->calculateAmount($adjustable),
            'is_locked' => $this->isLocked(),
            'is_included' => $this->isIncluded(),
        ];
    }
}
