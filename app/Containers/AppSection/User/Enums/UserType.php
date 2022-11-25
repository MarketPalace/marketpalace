<?php
/**
 * Contains the UserType enum class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2016-12-18
 *
 */

namespace App\Containers\AppSection\User\Enums;

use App\Ship\Utils\Enum;
use App\Containers\AppSection\User\Contracts\UserType as UserTypeContract;

/**
 * @method static UserType ADMIN()
 * @method static UserType CLIENT()
 * @method static UserType API()
 *
 * @method bool isAdmin()
 * @method bool isClient()
 * @method bool isApi()
 *
 * @property-read bool $is_admin
 * @property-read bool $is_client
 * @property-read bool $is_api
 */
class UserType extends Enum implements UserTypeContract
{
    const __DEFAULT = self::CLIENT;

    const ADMIN     = 'admin';
    const CLIENT    = 'client';
    const API       = 'api';
}
