<?php

declare(strict_types=1);

/**
 * Contains the PaymentHistory class.
 *
 * @copyright   Copyright (c) 2020 Aboozar Ghaffari
 * @package     MarketPalace/Payment
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Models;

use App\Containers\MarketPalace\Payment\Contracts\Payment;
use App\Containers\MarketPalace\Payment\Contracts\PaymentHistory as PaymentHistoryContract;
use App\Containers\MarketPalace\Payment\Contracts\PaymentResponse;
use App\Containers\MarketPalace\Payment\Contracts\PaymentStatus;
use App\Ship\Utils\CastsEnums;
use App\Ship\Utils\Enum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $payment_id
 * @property Payment $payment
 * @property \App\Containers\MarketPalace\Payment\Enums\PaymentStatus $old_status
 * @property \App\Containers\MarketPalace\Payment\Enums\PaymentStatus $new_status
 * @property ?string $message
 * @property ?string $native_status
 * @property ?float $transaction_amount
 * @property ?string $transaction_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static PaymentHistory create(array $attributes)
 */
class PaymentHistory extends Model implements PaymentHistoryContract
{
    use CastsEnums;

    protected $table = 'payment_history';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected array $enums = [
        'old_status' => 'PaymentStatusProxy@enumClass',
        'new_status' => 'PaymentStatusProxy@enumClass',
    ];

    protected string $resourceKey = 'PaymentHistory';

    public static function addPaymentResponse(
        Payment $payment,
        PaymentResponse $response,
        PaymentStatus $oldStatus = null
    ): PaymentHistoryContract {
        return PaymentHistoryProxy::create([
            'payment_id' => $payment->id,
            'old_status' => $oldStatus ?: $payment->getStatus()->value(),
            'new_status' => $response->getStatus()->value(),
            'message' => $response->getMessage(),
            'transaction_amount' => $response->getAmountPaid(),
            'native_status' => $response->getNativeStatus()->value(),
            'transaction_number' => $response->getTransactionId(),
        ]);
    }

    public static function addEvent(
        Payment $payment,
        string $message,
        ?string $transactionNumber = null,
        ?Enum $nativeStatus = null
    ): PaymentHistoryContract {
        return PaymentHistoryProxy::create([
            'payment_id' => $payment->id,
            'old_status' => $payment->getStatus()->value(),
            'new_status' => $payment->getStatus()->value(),
            'message' => $message,
            'native_status' => $nativeStatus?->value(),
            'transaction_number' => $transactionNumber,
        ]);
    }

    public static function begin(Payment $payment): PaymentHistory
    {
        return PaymentHistory::create([
            'payment_id' => $payment->id,
            'new_status' => $payment->getStatus(),
            'message' => __('Payment created')
        ]);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(PaymentProxy::modelClass(), 'id', 'payment_id');
    }
}
