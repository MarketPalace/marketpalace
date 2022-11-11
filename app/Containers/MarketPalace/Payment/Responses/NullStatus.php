<?php

declare(strict_types=1);

/**
 * Contains the NullStatus class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace/Payment
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Responses;

use App\Ship\Utils\Enum;

final class NullStatus extends Enum
{
    public const __DEFAULT = self::NONE;
    public const NONE = null;
}
