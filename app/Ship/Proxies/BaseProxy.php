<?php
/**
 * Contains the BaseProxy class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Proxies;

use App\Ship\Utils\Proxifier;
use LogicException;

abstract class BaseProxy
{
    /** @var Proxifier */
    public Proxifier $proxifier;

    /** @var string */
    protected string $contract;

    /** @var array */
    protected static array $instances = [];

    /**
     * Repository constructor.
     *
     * @param  Proxifier|null  $proxifier
     */
    public function __construct(Proxifier $proxifier = null)
    {
        $this->proxifier = $proxifier ?: app(Proxifier::class);

        if (empty($this->contract)) {
            $this->contract = $this->guessContract();
        }

        if (!interface_exists($this->contract)) {
            throw new LogicException(
                sprintf(
                    'The proxy %s has a non-existent contract class: `%s`',
                    static::class,
                    $this->contract
                )
            );
        }
    }

    protected function guessContract(): string
    {
        return str_replace(['Proxy', 'Models', 'Enums'], ['', 'Contracts', 'Contracts'], static::class);
    }

    /**
     * Resets the proxy by removing the class instance.
     * Shouldn't be used in application code.
     *
     */
    public static function __reset(): void
    {
        // This is only needed to ensure that in the rare case when
        // the app instance gets replaced along with the Proxifier
        // singleton in runtime, no stale concord survives it
        if (isset(static::$instances[static::class])) {
            unset(static::$instances[static::class]);
        }
    }

    /**
     * @param $method
     * @param $parameters
     *
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        return call_user_func(static::getInstance()->targetClass() . '::' . $method, ...$parameters);
    }

    /**
     * This is a method where the dark word 'static' has 7 occurrences
     *
     * @return BaseProxy
     */
    public static function getInstance(): BaseProxy
    {
        if (!isset(static::$instances[static::class])) {
            static::$instances[static::class] = new static();
        }

        return static::$instances[static::class];
    }

    /**
     * Returns the resolved class
     *
     * @return string
     */
    abstract protected function targetClass(): string;
}
