<?php
/**
 * Contains the AddressesTest class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Tests\Unit;

use App\Containers\MarketPalace\Address\Enums\AddressType;
use App\Containers\MarketPalace\Address\Models\AddressProxy;
use App\Containers\MarketPalace\Customer\Enums\CustomerType;
use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Containers\MarketPalace\Customer\Models\CustomerProxy;
use App\Containers\MarketPalace\Customer\Tests\TestCase;
use Illuminate\Support\Collection;

class AddressesTest extends TestCase
{
    /**
     * @test
     */
    public function customer_has_addresses_collection()
    {
        $customer = CustomerProxy::create([]);

        $this->assertInstanceOf(Collection::class, $customer->addresses);
    }

    /**
     * @test
     */
    public function customer_addresses_can_be_added()
    {
        $billing = AddressProxy::create([
            'name'       => 'Market Palace Inc.',
            'country_id' => 'US',
            'address'    => 'HQ Street 2',
            'type'       => AddressType::BILLING
        ]);

        $shipping = AddressProxy::create([
            'name'       => 'Market Palace Inc.',
            'country_id' => 'US',
            'address'    => 'Billing Street 1',
            'type'       => AddressType::SHIPPING
        ]);

        $customer = Customer::create([
            'type'         => CustomerType::ORGANIZATION,
            'company_name' => 'Market Palace` Inc.'
        ]);

        $customer->addresses()->save($billing);
        $customer->addresses()->save($shipping);

        $customer = $customer->fresh();

        $this->assertCount(2, $customer->addresses);
    }
}
