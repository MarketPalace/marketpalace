<?php

declare(strict_types=1);

/**
 * Contains the LinkType interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Contracts;

interface LinkType
{
    public static function findBySlug(string $slug): ?LinkType;
}
