<?php

declare(strict_types=1);

/**
 * Contains the HasInvitation trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2020-12-18
 *
 */

namespace App\Containers\MarketPalace\User\Traits;

use App\Containers\MarketPalace\User\Contracts\Invitation;

trait HasInvitation
{
    /** @var Invitation */
    public Invitation $invitation;

    public function getInvitation(): Invitation
    {
        return $this->invitation;
    }
}
