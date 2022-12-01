<?php

declare(strict_types=1);

/**
 * Contains the InvitationEvent interface.
 *
 * @copyright   Copyright (c) 2020 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2020-12-18
 *
 */

namespace App\Containers\MarketPalace\User\Contracts;

interface InvitationEvent
{
    public function getInvitation(): Invitation;
}
