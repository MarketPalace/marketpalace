<?php

declare(strict_types=1);

/**
 * Contains the PropertyTypes class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Property;

use App\Containers\MarketPalace\Property\Contracts\PropertyType;
use App\Containers\MarketPalace\Property\Types\Boolean;
use App\Containers\MarketPalace\Property\Types\Integer;
use App\Containers\MarketPalace\Property\Types\Number;
use App\Containers\MarketPalace\Property\Types\Text;

final class PropertyTypes
{
    private const BUILT_IN_TYPES = [
        'text' => Text::class,
        'boolean' => Boolean::class,
        'integer' => Integer::class,
        'number' => Number::class
    ];

    private static $registry = self::BUILT_IN_TYPES;

    public static function register(string $type, string $class)
    {
        if (array_key_exists($type, self::$registry)) {
            return;
        }

        if (!in_array(PropertyType::class, class_implements($class))) {
            throw new \InvalidArgumentException(
                sprintf(
                    'The class you are trying to register (%s) as property type, ' .
                    'must implement the %s interface.',
                    $class,
                    PropertyType::class
                )
            );
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

    public static function values(): array
    {
        return array_keys(self::$registry);
    }

    public static function choices(): array
    {
        $result = [];

        foreach (self::$registry as $type => $class) {
            $result[$type] = (new $class())->getName();
        }

        return $result;
    }

    public static function guessTypeFromValue(mixed $value): string
    {
        return match (true) {
            is_int($value) => 'integer',
            is_numeric($value) => 'number',
            is_bool($value) => 'boolean',
            default => 'text'
        };
    }
}
