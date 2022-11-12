<?php
/**
 * Contains the Contracts Test class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Tests\Unit;

use App\Containers\MarketPalace\Customer\Tests\TestCase;

use App\Containers\MarketPalace\Customer\Contracts\Customer as CustomerContract;
use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Containers\MarketPalace\Customer\Models\CustomerProxy;

class ContractsTest extends TestCase
{
    /**
     * @test
     */
    public function model_can_be_resolved_from_interface()
    {
        $customer = $this->app->make(CustomerContract::class);

        $this->assertInstanceOf(CustomerContract::class, $customer);

        // We also expect that it's the default customer model from this package
        $this->assertInstanceOf(Customer::class, $customer);
    }

    /**
     * @test
     */
    public function model_proxy_resolves_to_default_model()
    {
        $this->assertEquals(Customer::class, CustomerProxy::modelClass());
    }
}
