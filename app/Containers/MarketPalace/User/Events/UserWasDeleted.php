<?php
/**
 * Contains the UserWasDeleted event class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2017-07-30
 *
 */

namespace App\Containers\MarketPalace\User\Events;

use App\Containers\MarketPalace\User\Contracts\UserEvent;
use App\Containers\MarketPalace\User\Traits\HasUser;

class UserWasDeleted implements UserEvent
{
    use HasUser;
}
