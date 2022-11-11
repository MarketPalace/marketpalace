<?php

declare(strict_types=1);

/**
 * Contains the Payment interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Contracts;

/**
 * @method static PaymentStatus PENDING()
 * @method static PaymentStatus AUTHORIZED()
 * @method static PaymentStatus ON_HOLD()
 * @method static PaymentStatus PAID()
 * @method static PaymentStatus PARTIALLY_PAID()
 * @method static PaymentStatus DECLINED()
 * @method static PaymentStatus TIMEOUT()
 * @method static PaymentStatus CANCELLED()
 * @method static PaymentStatus REFUNDED()
 */
interface PaymentStatus
{
    /** @return string */
    public function value(): mixed;

    /** @return string */
    public function label(): string;
}
