<?php
/**
 * Contains the NameOrder enum class.
 *
 * @copyright   Copyright (c) 2016 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Enums;

use App\Containers\MarketPalace\Address\Contracts\NameOrder as NameOrderContract;
use App\Ship\Utils\Enum;

class NameOrder extends Enum implements NameOrderContract
{
    const __DEFAULT = self::WESTERN;

    const WESTERN   = 'western';
    const EASTERN   = 'eastern';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::WESTERN => __('Western'),
            self::EASTERN => __('Eastern')
        ];
    }
}
