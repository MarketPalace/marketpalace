<?php

declare(strict_types=1);

/**
 * Contains the NanoIdGenerator class.
 *
 * @copyright   Copyright (c) 2020 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Order\Generators;

use App\Containers\MarketPalace\Order\Contracts\Order;
use App\Containers\MarketPalace\Order\Contracts\OrderNumberGenerator;
use App\Containers\MarketPalace\Order\Models\OrderProxy;

class SequentialNumberGenerator implements OrderNumberGenerator
{
    /** @var int */
    protected int $startSequenceFrom;

    /** @var string */
    protected string $prefix;

    /** @var int */
    protected int $padLength;

    /** @var string */
    protected string $padString;

    public function __construct()
    {
        $this->startSequenceFrom = $this->config('start_sequence_from', 1);
        $this->prefix = $this->config('prefix', '');
        $this->padLength = $this->config('pad_length', 1);
        $this->padString = $this->config('pad_string', '0');
    }

    /**
     * @inheritDoc
     */
    public function generateNumber(Order $order = null): string
    {
        $lastOrder = OrderProxy::orderBy('id', 'desc')->limit(1)->first();

        $last = $lastOrder ? $lastOrder->id : 0;
        $next = $this->startSequenceFrom + $last;

        return sprintf(
            '%s%s',
            $this->prefix,
            str_pad((string) $next, $this->padLength, $this->padString, STR_PAD_LEFT)
        );
    }

    /**
     * Returns a configuration value for this particular service
     *
     * @param string    $key
     * @param null      $default
     *
     * @return mixed
     */
    private function config($key, $default = null)
    {
        return config('marketPalace.order.number.sequential_number.' . $key, $default);
    }
}
