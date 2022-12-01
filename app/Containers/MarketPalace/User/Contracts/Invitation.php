<?php

declare(strict_types=1);

/**
 * Contains the Invitation interface.
 *
 * @copyright   Copyright (c) 2020 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2020-12-18
 *
 */

namespace App\Containers\MarketPalace\User\Contracts;

interface Invitation
{
    public static function findByHash(string $hash): ?self;

    public static function generateInvitationCode(): string;

    public function getTheCreatedUser(): ?User;

    public function isStillValid(): bool;

    public function isNoLongerValid(): bool;

    public function hasNotBeenUtilizedYet(): bool;

    public function hasBeenUtilizedAlready(): bool;

    public function isExpired(): bool;

    public function isNotExpired(): bool;
}
