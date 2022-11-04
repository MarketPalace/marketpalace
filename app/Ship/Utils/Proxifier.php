<?php
/**
 * Contains the Concord class.
 *
 * @copyright   Copyright (c) 2016 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Ship\Utils;

use App\Ship\Contracts\MarketPalace\Proxy as ProxyContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Arr;
use InvalidArgumentException;

class Proxifier implements ProxyContract
{

    /** @var array */
    public array $models = [];

    /** @var array */
    protected array $enums = [];

    /** @var  Application */
    protected Application $app;

    /**
     * Concord class constructor
     *
     * @param  Application  $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @inheritDoc
     */
    public function registerModel(string $abstract, string $concrete)
    {
        if (!is_subclass_of($concrete, $abstract, true)) {
            throw new InvalidArgumentException("Class {$concrete} must extend or implement {$abstract}. ");
        }

        $this->models[$abstract] = $concrete;
        $this->app->alias($concrete, $abstract);

        $this->resetProxy($this->proxyForClass($concrete));
    }

    /**
     * Resets the proxy class to ensure no stale instance gets stuck
     *
     * @param  string  $proxyClass
     */
    protected function resetProxy(string $proxyClass)
    {
        $proxyClass::__reset();
    }

    public function proxyForClass(string $modelClass): string
    {
        return $modelClass.'Proxy';
    }

    /**
     * @inheritDoc
     */
    public function model(string $abstract)
    {
        return Arr::get($this->models, $abstract);
    }

    /**
     * @inheritDoc
     */
    public function registerEnum(string $abstract, string $concrete)
    {
        if (!is_subclass_of($concrete, $abstract, true)) {
            throw new InvalidArgumentException("Class {$concrete} must extend or implement {$abstract}. ");
        }

        $this->enums[$abstract] = $concrete;
        $this->app->alias($concrete, $abstract);

        $this->resetProxy($this->proxyForClass($concrete));
    }

    /**
     * @inheritDoc
     */
    public function enum(string $abstract)
    {
        return Arr::get($this->enums, $abstract);
    }
}
