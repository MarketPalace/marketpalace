<?php
/**
 * Contains the Gravatar class.
 *
 * @copyright   Copyright (c) 2018 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2018-11-18
 *
 */

namespace App\Containers\AppSection\User\Avatar;

use App\Containers\AppSection\User\Contracts\Avatar;

final class Gravatar implements Avatar
{
    const CONFIG_ROOT_KEY = 'market_palace.user.avatar.gravatar.';

    /** @var string */
    private string $email;

    public function __construct($email)
    {
        if (is_callable($email)) {
            $this->closure = $email;
        } else {
            $this->email = (string) $email;
        }
    }

    public static function create(string $data = null): Avatar
    {
        return new self($data);
    }

    public function getData(): string
    {
        return $this->email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUrl(string $variant = null): string
    {
        $hash    = md5($this->email);
        $default = $this->config('default_image');
        $size    = is_null($variant) ? $this->config('default_size') : (int) $variant;

        return sprintf(
            "https://www.gravatar.com/avatar/%s.jpg?s=%d&d=%s",
            $hash,
            $size,
            $default
        );
    }

    public function delete()
    {
        // Out of scope
    }

    private static function config(string $key, $default = null)
    {
        return config(self::CONFIG_ROOT_KEY . $key, $default);
    }
}
