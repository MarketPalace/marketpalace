<?php

declare(strict_types=1);

/**
 * Contains the UserInvitationUtilized class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2020-12-18
 *
 */

namespace App\Containers\AppSection\User\Events;

use App\Containers\AppSection\User\Contracts\Invitation;
use App\Containers\AppSection\User\Contracts\InvitationEvent;
use App\Containers\AppSection\User\Contracts\User;
use App\Containers\AppSection\User\Contracts\UserEvent;
use App\Containers\AppSection\User\Traits\HasInvitation;

class UserInvitationUtilized implements InvitationEvent, UserEvent
{
    use HasInvitation;

    public $user;

    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
        $this->user = $invitation->getTheCreatedUser();
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
