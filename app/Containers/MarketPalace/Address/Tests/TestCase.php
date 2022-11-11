<?php

namespace App\Containers\MarketPalace\Address\Tests;

use App\Ship\Parents\Tests\PhpUnit\TestCase as ShipTestCase;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends ShipTestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
    }

    /**
     * Set up the environment.
     *
     * @param  Application  $app
     */
    protected function getEnvironmentSetUp(Application $app)
    {
        $app['path.lang'] = __DIR__.'/lang';

        $engine = env('TEST_DB_ENGINE', 'sqlite');

        $app['config']->set('database.default', $engine);
        $app['config']->set('database.connections.'.$engine, [
            'driver' => $engine,
            'database' => 'sqlite' == $engine ? ':memory:' : 'address_test',
            'prefix' => '',
            'host' => env('TEST_DB_HOST', '127.0.0.1'),
            'port' => env('TEST_DB_PORT'),
            'username' => env('TEST_DB_USERNAME', 'pgsql' === $engine ? 'postgres' : 'root'),
            'password' => env('TEST_DB_PASSWORD', '')
        ]);

        if ('pgsql' === $engine) {
            $app['config']->set("database.connections.{$engine}.charset", 'utf8');
        }
    }

    /**
     * Set up the database.
     *
     * @param  Application  $app
     */
    protected function setUpDatabase(Application $app)
    {
        \Artisan::call('migrate', ['--force' => true]);
    }
}
