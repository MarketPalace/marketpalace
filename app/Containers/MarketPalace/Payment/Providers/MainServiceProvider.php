<?php

namespace App\Containers\MarketPalace\Payment\Providers;

use App\Containers\MarketPalace\Payment\Enums\PaymentStatus;
use App\Containers\MarketPalace\Payment\Gateways\NullGateway;
use App\Containers\MarketPalace\Payment\Models\Payment;
use App\Containers\MarketPalace\Payment\Models\PaymentHistory;
use App\Containers\MarketPalace\Payment\Models\PaymentMethod;
use App\Containers\MarketPalace\Payment\PaymentGateways;
use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    protected array $models = [
        PaymentMethod::class,
        Payment::class,
        PaymentHistory::class,
    ];

    protected array $enums = [
        PaymentStatus::class,
    ];

    public function boot(): void
    {
        parent::boot();
        PaymentGateways::register('null', NullGateway::class);
    }
}
