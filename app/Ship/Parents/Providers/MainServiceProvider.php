<?php

namespace App\Ship\Parents\Providers;

use Apiato\Core\Abstracts\Providers\MainServiceProvider as AbstractMainServiceProvider;
use App\Ship\Contracts\MarketPalace\Proxy as ProxyContract;
use App\Ship\Utils\Proxifier;
use http\Exception\InvalidArgumentException;

abstract class MainServiceProvider extends AbstractMainServiceProvider
{
    /** @var array */
    protected array $models = [];

    /** @var array */
    protected array $enums = [];

    /** @var  ProxyContract */
    protected ProxyContract $proxifier;


    public function __construct($app)
    {
        parent::__construct($app);

        $this->proxifier = app(Proxifier::class);
    }

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();

        $this->registerModels();
        $this->registerEnums();
    }

    /**
     * Register models in a box/module
     */
    protected function registerModels()
    {
        foreach ($this->models as $key => $model) {
            $contract = is_string($key) ? $key : str_replace('Models', 'Contracts', $model);
            $this->proxifier->registerModel($contract, $model);
        }
    }

    /**
     * Register enums in a box/module
     */
    protected function registerEnums()
    {
        foreach ($this->enums as $key => $enum) {
            $contract = is_string($key) ? $key : str_replace('Enums', 'Contracts', $enum);
            $this->proxifier->registerEnum($contract, $enum);
        }
    }

    /**
     * @inheritDoc
     */
    public function registerModel(string $abstract, string $concrete)
    {
        if (!is_subclass_of($concrete, $abstract, true)) {
            throw new InvalidArgumentException("Class {$concrete} must extend or implement {$abstract}. ");
        }

        $this->proxifier->registerModel($abstract, $concrete);
    }

    /**
     * Resets the proxy class to ensure no stale instance gets stuck
     *
     * @param string $proxyClass
     */
    protected function resetProxy($proxyClass)
    {
        $proxyClass::__reset();
    }
}
