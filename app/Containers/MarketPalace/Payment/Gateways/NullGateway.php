<?php

declare(strict_types=1);

/**
 * Contains the NullGateway class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Gateways;

use Illuminate\Http\Request;
use App\Ship\Contracts\MarketPalace\Address;
use App\Containers\MarketPalace\Payment\Contracts\Payment;
use App\Containers\MarketPalace\Payment\Contracts\PaymentGateway;
use App\Containers\MarketPalace\Payment\Contracts\PaymentRequest;
use App\Containers\MarketPalace\Payment\Contracts\PaymentResponse;
use App\Containers\MarketPalace\Payment\Requests\NullRequest;
use App\Containers\MarketPalace\Payment\Responses\NullResponse;

class NullGateway implements PaymentGateway
{
    public static function getName(): string
    {
        return __('Offline');
    }

    public function createPaymentRequest(
        Payment $payment,
        Address $shippingAddress = null,
        array $options = []
    ): PaymentRequest {
        return new NullRequest($payment);
    }

    public function processPaymentResponse(Request $request, array $options = []): PaymentResponse
    {
        return new NullResponse();
    }

    public function isOffline(): bool
    {
        return true;
    }
}
