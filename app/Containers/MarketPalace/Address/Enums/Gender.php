<?php
/**
 * Contains the Gender enum class.
 *
 * @copyright   Copyright (c) 2016 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Enums;

use App\Containers\MarketPalace\Address\Contracts\Gender as GenderContract;
use App\Ship\Utils\Enum;

/**
 * @method static Gender UNKNOWN()
 * @method static Gender MALE()
 * @method static Gender FEMALE()
 */
class Gender extends Enum implements GenderContract
{
    const UNKNOWN = null;
    const MALE    = 'm';
    const FEMALE  = 'f';

    protected static array $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::UNKNOWN => __('Unknown'),
            self::MALE    => __('Male'),
            self::FEMALE  => __('Female')
        ];
    }
}
