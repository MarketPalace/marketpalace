<?php

declare(strict_types=1);

/**
 * Contains the InexistentPaymentGatewayException class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Exceptions;

use RuntimeException;

class InexistentPaymentGatewayException extends RuntimeException
{
}
