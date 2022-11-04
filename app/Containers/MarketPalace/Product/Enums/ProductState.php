<?php

declare(strict_types=1);

/**
 * Contains the ProductState enum class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalce
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Product\Enums;

use App\Containers\MarketPalace\Product\Contracts\ProductState as ProductStateContract;
use App\Ship\Utils\Enum;

/**
 * @property bool $is_draft
 * @property bool $is_inactive
 * @property bool $is_active
 * @property bool $is_unavailable
 * @property bool $is_retired
 *
 * @method static ProductState DRAFT()
 * @method static ProductState INACTIVE()
 * @method static ProductState ACTIVE()
 * @method static ProductState UNAVAILABLE()
 * @method static ProductState RETIRED()
 */
class ProductState extends Enum implements ProductStateContract
{
    public const __DEFAULT = self::DRAFT;

    public const DRAFT = 'draft';
    public const INACTIVE = 'inactive';
    public const ACTIVE = 'active';
    public const UNAVAILABLE = 'unavailable';
    public const RETIRED = 'retired';

    protected static array $activeStates = [self::ACTIVE];

    public function isActive(): bool
    {
        return in_array($this->value, static::$activeStates);
    }

    public static function getActiveStates(): array
    {
        return static::$activeStates;
    }
}
