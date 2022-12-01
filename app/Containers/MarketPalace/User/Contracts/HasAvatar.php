<?php
/**
 * Contains the HasAvatar interface.
 *
 * @copyright   Copyright (c) 2018 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2018-11-18
 *
 */

namespace App\Containers\MarketPalace\User\Contracts;

interface HasAvatar
{
    public function setAvatar(Avatar $avatar);

    public function getAvatar(): ?Avatar;

    public function removeAvatar();

    public function hasAvatar(): bool;

    public function avatarUrl(string $variant = null): ?string;
}
