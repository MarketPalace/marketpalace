<?php

declare(strict_types=1);

/**
 * Contains the AdjustmentTypeProxy class.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Enums;

use App\Ship\Proxies\EnumProxy;

/**
 * @method static AdjustmentType PROMOTION()
 * @method static AdjustmentType SHIPPING()
 * @method static AdjustmentType TAX()
 * @method static AdjustmentType MISC()
 *
 * @method bool isPromotion()
 * @method bool isShipping()
 * @method bool isTax()
 * @method bool isMisc()
 */
class AdjustmentTypeProxy extends EnumProxy
{
}
