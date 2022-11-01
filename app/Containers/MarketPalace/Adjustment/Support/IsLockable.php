<?php

declare(strict_types=1);

/**
 * Contains the IsLockable trait.
 *
 * @copyright   Copyright (c) 2021 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Adjustment\Support;

trait IsLockable
{
    private bool $isLocked = false;

    public function isLocked(): bool
    {
        return $this->isLocked;
    }

    public function lock(): void
    {
        $this->isLocked = true;
    }

    public function unlock(): void
    {
        $this->isLocked = false;
    }
}
