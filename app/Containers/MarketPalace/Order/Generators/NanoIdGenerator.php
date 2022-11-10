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
use App\Ship\Generators\NanoIdGenerator as BaseNanoIdGenerator;

final class NanoIdGenerator extends BaseNanoIdGenerator implements OrderNumberGenerator
{
    private const ALPHABET = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    private int $size = 12;

    public function __construct(int $size = null, string $alphabet = null)
    {
        parent::__construct(
            $size ?? $this->config('size', $this->size),
            $alphabet ?? $this->config('alphabet', self::ALPHABET)
        );
    }

    public function generateNumber(Order $order = null): string
    {
        return parent::generate();
    }

    private function config(string $key, $default = null)
    {
        return config('marketPalace.order.number.nano_id.' . $key, $default);
    }
}
