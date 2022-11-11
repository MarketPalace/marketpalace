<?php

declare(strict_types=1);

/**
 * Contains the Property interface.
 *
 * @copyright   Copyright (c) 2018 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Property\Contracts;

interface PropertyType
{
    public function getName(): string;

    public function transformValue(string $value, ?array $settings);
}
