<?php
/**
 * Contains the Profile interface.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2017-04-08
 *
 */

namespace App\Containers\AppSection\User\Contracts;

interface Profile extends HasAvatar
{
    public function getUser(): User;
}
