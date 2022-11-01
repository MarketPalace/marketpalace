<?php

declare(strict_types=1);

/**
 * Contains the HasWriteableTitleAndDescription trait.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Support;

trait HasWriteableTitleAndDescription
{
    private string $title = '';

    private ?string $description = null;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function removeDescription(): void
    {
        $this->description = null;
    }
}
