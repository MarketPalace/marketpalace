<?php

declare(strict_types=1);

/**
 * Contains the UserInvitationCreated class.
 *
 * @copyright   Copyright (c) 2020 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2020-12-18
 *
 */

namespace App\Containers\AppSection\User\Events;

use App\Containers\AppSection\User\Contracts\Invitation;
use App\Containers\AppSection\User\Contracts\InvitationEvent;
use App\Containers\AppSection\User\Traits\HasInvitation;

class UserInvitationCreated implements InvitationEvent
{
    use HasInvitation;

    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
    }
}
