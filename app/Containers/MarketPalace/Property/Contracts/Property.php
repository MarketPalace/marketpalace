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

use Illuminate\Support\Collection;

interface Property
{
    public function getType(): PropertyType;

    public function values(): Collection;

    public static function findBySlug(string $slug): ?Property;
}
