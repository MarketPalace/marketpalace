<?php

declare(strict_types=1);

/**
 * Contains the HasImages interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Contracts\MarketPalace;

use Illuminate\Support\Collection;

interface HasImages
{
    public function hasImage(): bool;

    public function imageCount(): int;

    public function getThumbnailUrl(): ?string;

    public function getThumbnailUrls(): Collection;

    public function getImageUrl(string $variant = ''): ?string;

    public function getImageUrls(string $variant = ''): Collection;
}
