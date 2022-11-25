<?php
/**
 * Contains the User interface.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2017-03-24
 *
 */

namespace App\Containers\AppSection\User\Contracts;

interface User
{
    public function inactivate();

    public function activate();

    public function getProfile(): ?Profile;
}
