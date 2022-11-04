<?php
/**
 * Contains the EnumProxy class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Proxies;

class EnumProxy extends BaseProxy
{
    /**
     * Returns the real enum class FQCN
     *
     * @return string
     */
    public static function enumClass()
    {
        $instance = static::getInstance();

        return $instance->targetClass();
    }

    /**
     * @inheritDoc
     */
    protected function targetClass(): string
    {
        return $this->proxifier->enum($this->contract);
    }
}
