<?php
/**
 * Contains the HasUser trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2018-11-18
 *
 */

namespace App\Containers\MarketPalace\User\Traits;

use App\Containers\MarketPalace\User\Contracts\User;

trait HasUser
{
    /** @var  User */
    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @inheritDoc
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
