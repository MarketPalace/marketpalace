<?php

declare(strict_types=1);

/**
 * Contains the Boolean class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Property\Types;

use App\Containers\MarketPalace\Property\Contracts\PropertyType;

class Boolean implements PropertyType
{
    private const FALSE_VALUES = ['false', '0', '', 'null', 'no'];

    public function getName(): string
    {
        return __('Boolean');
    }

    public function transformValue(string $value, ?array $settings)
    {
        return !in_array(strtolower($value), static::FALSE_VALUES);
    }
}
