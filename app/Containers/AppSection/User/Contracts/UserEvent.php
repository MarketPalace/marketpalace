<?php
/**
 * Contains the UserEvent interface.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2017-07-29
 *
 */

namespace App\Containers\AppSection\User\Contracts;

interface UserEvent
{
    /**
     * Return the user associated with the event
     *
     * @return User
     */
    public function getUser(): User;
}
