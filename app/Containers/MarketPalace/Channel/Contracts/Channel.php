<?php

declare(strict_types=1);

/**
 * Contains the Channel interface.
 *
 * @copyright   Copyright (c) 2019 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Channel\Contracts;

interface Channel
{
    public function getName(): string;

    public function getSlug(): ?string;
}
