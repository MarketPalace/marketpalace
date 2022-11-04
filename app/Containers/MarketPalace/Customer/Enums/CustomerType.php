<?php
/**
 * Contains the CustomerType enum class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Enums;

use App\Containers\MarketPalace\Customer\Contracts\CustomerType as CustomerTypeContract;
use App\Ship\Utils\Enum;

class CustomerType extends Enum implements CustomerTypeContract
{
    const __DEFAULT    = self::ORGANIZATION;

    const ORGANIZATION = 'organization';
    const INDIVIDUAL   = 'individual';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::ORGANIZATION => __('Organization'),
            self::INDIVIDUAL   => __('Individual')
        ];
    }
}
