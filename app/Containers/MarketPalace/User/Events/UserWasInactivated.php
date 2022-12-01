<?php
/**
 * Contains the UserWasInactivated event class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2017-07-29
 *
 */

namespace App\Containers\MarketPalace\User\Events;

use App\Containers\MarketPalace\User\Contracts\UserEvent;
use App\Containers\MarketPalace\User\Traits\HasUser;

class UserWasInactivated implements UserEvent
{
    use HasUser;
}
