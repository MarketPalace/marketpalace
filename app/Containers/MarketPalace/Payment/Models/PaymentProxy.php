<?php

declare(strict_types=1);

/**
 * Contains the PaymentProxy class.
 *
 * @copyright   Copyright (c) 2020 Aboozar Ghaffari
 * @package     MarketPalace/Payment
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Models;

use App\Ship\Proxies\ModelProxy;

/**
 * @method static null|Payment findByHash(string $hash)
 * @method static null|Payment findByRemoteId(string $remoteId, int $paymentMethodId = null)
 */
class PaymentProxy extends ModelProxy
{
}
