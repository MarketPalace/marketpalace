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

use Illuminate\Http\Request;
use App\Ship\Contracts\MarketPalace\Address;

interface PaymentGateway
{
    public static function getName(): string;

    public function createPaymentRequest(
        Payment $payment,
        Address $shippingAddress = null,
        array $options = []
    ): PaymentRequest;

    public function processPaymentResponse(Request $request, array $options = []): PaymentResponse;

    public function isOffline(): bool;
}
