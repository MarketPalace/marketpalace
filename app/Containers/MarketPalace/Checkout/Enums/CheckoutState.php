<?php

declare(strict_types=1);

/**
 * Contains the CheckoutState enum class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Checkout\Enums;

use App\Ship\Utils\Enum;
use App\Containers\MarketPalace\Checkout\Contracts\CheckoutState as CheckoutStateContract;

/**
 * @method static VIRGIN()
 * @method static STARTED()
 * @method static READY()
 * @method static COMPLETED()
 *
 * @method bool isVirgin()
 * @method bool isStarted()
 * @method bool isReady()
 * @method bool isCompleted()
 */
class CheckoutState extends Enum implements CheckoutStateContract
{
    public const __DEFAULT = self::VIRGIN;

    public const VIRGIN = null;        // There was no interaction with the checkout process yet
    public const STARTED = 'started';   // The checkout process has been started
    public const READY = 'ready';     // Checkout data is valid and ready to submit
    public const COMPLETED = 'completed'; // Checkout has been completed

    protected static array $submittableStates = [self::READY];

    /**
     * @inheritdoc
     */
    public function canBeSubmitted(): bool
    {
        return in_array($this->value, static::$submittableStates);
    }

    /**
     * @inheritdoc
     */
    public static function getSubmittableStates(): array
    {
        return static::$submittableStates;
    }
}
