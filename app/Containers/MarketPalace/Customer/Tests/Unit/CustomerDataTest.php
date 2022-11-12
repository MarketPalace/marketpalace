<?php
/**
 * Contains the CustomerDataTest class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Tests\Unit;

use App\Containers\MarketPalace\Customer\Tests\TestCase;

use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Containers\MarketPalace\Customer\Models\CustomerProxy;
use App\Containers\MarketPalace\Customer\Enums\CustomerType;

class CustomerDataTest extends TestCase
{
    /**
     * @test
     */
    public function get_name_method_resolves_customer_name_roperly_depending_on_type()
    {
        $john = CustomerProxy::create([
            'type'      => CustomerType::INDIVIDUAL,
            'firstname' => 'Aboozar',
            'lastname'  => 'Ghaffari'
        ]);

        $this->assertEquals('Aboozar Ghaffari', $john->getName());

        $acme = CustomerProxy::create([
            'type'         => CustomerType::ORGANIZATION,
            'company_name' => 'Market Palace Inc.'
        ]);

        $this->assertEquals('Market Palace Inc.', $acme->getName());
    }

    /**
     * @test
     */
    public function all_individual_fields_can_be_set()
    {
        $giovanni = Customer::create([
            'type'             => CustomerType::INDIVIDUAL(),
            'firstname'        => 'Aboozar',
            'lastname'         => 'Ghaffari',
            'email'            => 'aboozar@email.com',
            'phone'            => '+1-123-456-789',
            'last_purchase_at' => '2022-09-21 04:20:41'
        ]);

        $giovanni->fresh();

        $this->assertEquals($giovanni->getName(), 'Aboozar Ghaffari');
        $this->assertEquals($giovanni->firstname, 'Aboozar');
        $this->assertEquals($giovanni->lastname, 'Ghaffari');
        $this->assertEquals($giovanni->email, 'aboozar@email.com');
        $this->assertEquals($giovanni->phone, '+1-123-456-789');
        $this->assertEquals($giovanni->last_purchase_at->format('Y-m-d H:i:s'), '2022-09-21 04:20:41');
    }

    /** @test */
    public function last_purchase_at_fields_type_is_either_null_or_date_time()
    {
        $good = Customer::create([
            'type'             => CustomerType::INDIVIDUAL(),
            'firstname'        => 'Buys',
            'lastname'         => 'Stuff',
            'last_purchase_at' => '2022-11-22 22:23:24'
        ]);

        $bad = Customer::create([
            'type'             => CustomerType::INDIVIDUAL(),
            'firstname'        => 'Buys No',
            'lastname'         => 'Stuff'
        ]);

        $this->assertNull($bad->last_purchase_at);
        $this->assertInstanceOf(\DateTime::class, $good->last_purchase_at);

        // Repeat with refetched data
        $this->assertNull($bad->fresh()->last_purchase_at);
        $this->assertInstanceOf(\DateTime::class, $good->fresh()->last_purchase_at);
    }

    /**
     * @test
     */
    public function all_organziation_customer_fields_can_be_set()
    {
        $shark = Customer::create([
            'type'            => CustomerType::ORGANIZATION(),
            'company_name'    => 'Shark Shoes & T-Shirts Inc.',
            'tax_nr'          => 'SH123456',
            'registration_nr' => 'SHARK-123',
            'email'           => 'aboozar@email.com',
            'phone'           => '001555777444',
        ]);

        $shark = $shark->fresh();

        $this->assertEquals($shark->getName(), 'Shark Shoes & T-Shirts Inc.');
        $this->assertEquals($shark->company_name, 'Shark Shoes & T-Shirts Inc.');
        $this->assertEquals($shark->tax_nr, 'SH123456');
        $this->assertEquals($shark->registration_nr, 'SHARK-123');
        $this->assertEquals($shark->email, 'aboozar@email.com');
        $this->assertEquals($shark->phone, '001555777444');
    }
}
