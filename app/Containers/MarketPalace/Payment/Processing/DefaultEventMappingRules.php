<?php

declare(strict_types=1);

/**
 * Contains the DefaultEventMappingRules class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace/Payment
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Processing;

use App\Containers\MarketPalace\Payment\Contracts\PaymentEventMap;
use App\Containers\MarketPalace\Payment\Contracts\PaymentStatus as PaymentStatusContract;
use App\Containers\MarketPalace\Payment\Enums\PaymentStatus;
use App\Containers\MarketPalace\Payment\Events\PaymentCompleted;
use App\Containers\MarketPalace\Payment\Events\PaymentDeclined;
use App\Containers\MarketPalace\Payment\Events\PaymentPartiallyReceived;
use App\Containers\MarketPalace\Payment\Events\PaymentTimedOut;

final class DefaultEventMappingRules implements PaymentEventMap
{
    private static array $eventMappingRules = [
        'fire' => [
            PaymentDeclined::class => [
                'ifStatusIs' => [
                    PaymentStatus::DECLINED => [
                        'andOldStatusIs' => ['*'],
                        'butOldStatusIsNot' => [
                            PaymentStatus::CANCELLED,
                            PaymentStatus::REFUNDED,
                            PaymentStatus::PARTIALLY_REFUNDED,
                        ],
                    ],
                ],
            ],
            PaymentCompleted::class => [
                'ifStatusIs' => [
                    PaymentStatus::AUTHORIZED => [
                        'andOldStatusIs' => [
                            PaymentStatus::PENDING,
                            PaymentStatus::ON_HOLD,
                            PaymentStatus::DECLINED,
                            PaymentStatus::TIMEOUT,
                        ],
                    ],
                    PaymentStatus::PAID => [],
                ],
            ],
            PaymentPartiallyReceived::class => [
                'ifStatusIs' => [
                    PaymentStatus::PARTIALLY_PAID => [
                        'butOldStatusIsNot' => [
                            PaymentStatus::PAID,
                        ],
                    ],
                ],
            ],
            PaymentTimedOut::class => [
                'ifStatusIs' => [
                    PaymentStatus::TIMEOUT => []
                ],
            ],
        ],
    ];

    private array $cursor = [];

    public function ifCurrentStatusIs(PaymentStatusContract $status): self
    {
        $this->cursor = [];
        foreach (self::$eventMappingRules['fire'] as $event => $conditions) {
            foreach ($conditions['ifStatusIs'] as $sourceStatus => $secondaryConditions) {
                if ($status->value() === $sourceStatus) {
                    $this->cursor[$event] = $secondaryConditions;
                }
            }
        }

        return $this;
    }

    public function andOldStatusIs(PaymentStatusContract $status): self
    {
        if (empty($this->cursor)) {
            return $this;
        }

        $cursorCopy = $this->cursor;
        foreach ($cursorCopy as $event => $secondaryConditions) {
            $allowedOldStatuses = $secondaryConditions['andOldStatusIs'] ?? null;
            if (null !== $allowedOldStatuses) {
                if (!in_array($status->value(), $allowedOldStatuses) && !in_array('*', $allowedOldStatuses)) {
                    unset($this->cursor[$event]);
                }
            }

            $excludedOldStatuses = $secondaryConditions['butOldStatusIsNot'] ?? null;
            if (null !== $excludedOldStatuses && in_array($status->value(), $excludedOldStatuses) && isset($this->cursor[$event])) {
                unset($this->cursor[$event]);
            }
        }

        return $this;
    }

    public function thenFireEvents(): array
    {
        $result = array_keys($this->cursor);
        // Reset the thing as we want it to be read as a sentence from start all over again
        $this->cursor = [];

        return $result;
    }
}
