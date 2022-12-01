<?php
/**
 * Contains the AvatarTypes class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\User;

use App\Containers\MarketPalace\User\Avatar\Gravatar;
use App\Containers\MarketPalace\User\Avatar\StorageAvatar;

final class AvatarTypes
{
    private const BUILT_IN_TYPES = [
        'storage' => StorageAvatar::class,
        'gravatar' => Gravatar::class
    ];

    private static array $registry = self::BUILT_IN_TYPES;

    public static function register(string $type, string $class): void
    {
        if (array_key_exists($type, self::$registry)) {
            return;
        }

        self::$registry[$type] = $class;
    }

    public static function getClass(string $type): ?string
    {
        return self::$registry[$type] ?? null;
    }

    public static function getType(string $class): ?string
    {
        foreach (self::$registry as $type => $className) {
            if ($class === $className) {
                return $type;
            }
        }

        return null;
    }
}
