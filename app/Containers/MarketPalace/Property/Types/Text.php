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

class Text implements PropertyType
{
    public function getName(): string
    {
        return __('Text');
    }

    public function transformValue(string $value, ?array $settings): string
    {
        return $value;
    }
}
