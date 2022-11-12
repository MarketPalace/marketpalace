<?php

declare(strict_types=1);

/**
 * Contains the CreateCustomerTest class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Tests\Unit;

use App\Containers\MarketPalace\Customer\Tests\TestCase;
use Illuminate\Support\Facades\Event;
use App\Containers\MarketPalace\Customer\Events\CustomerWasCreated;
use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Containers\MarketPalace\Customer\Models\CustomerProxy;
use App\Containers\MarketPalace\Customer\Enums\CustomerType;

class CreateCustomerTest extends TestCase
{
    /**
     * @test
     */
    public function customer_can_be_created_with_minimal_data()
    {
        $customer = CustomerProxy::create([])->fresh();

        $this->assertTrue($customer->is_active);
        $this->assertEquals(CustomerType::__DEFAULT, $customer->type->value());
    }

    /**
     * @test
     */
    public function customer_type_can_be_set_from_string()
    {
        $customer = new Customer();

        $customer->type = CustomerType::INDIVIDUAL;
        $customer->save();

        $customer = $customer->fresh();
        $this->assertEquals(CustomerType::INDIVIDUAL, $customer->type->value());
    }

    /**
     * @test
     */
    public function customer_type_can_be_set_from_enum()
    {
        $customer = new Customer();

        $customer->type = CustomerType::INDIVIDUAL();
        $customer->save();

        $customer = $customer->fresh();
        $this->assertTrue(CustomerType::INDIVIDUAL()->equals($customer->type));
    }

    /**
     * @test
     */
    public function individual_customer_can_be_created()
    {
        $john = CustomerProxy::create([
            'type'      => CustomerType::INDIVIDUAL,
            'firstname' => 'Aboozar',
            'lastname'  => 'Ghaffari'
        ]);

        $this->assertTrue($john->type->isIndividual());
        $this->assertEquals('Aboozar', $john->firstname);
        $this->assertEquals('Ghaffari', $john->lastname);

        $john = $john->fresh(); // still there?

        $this->assertEquals('Aboozar', $john->firstname);
        $this->assertEquals('Ghaffari', $john->lastname);

        $john = CustomerProxy::find($john->id); // I'm bastard to see if it's still there

        $this->assertEquals('Aboozar', $john->firstname);
        $this->assertEquals('Ghaffari', $john->lastname);
    }

    /**
     * @test
     */
    public function org_customer_can_be_created()
    {
        $mp = CustomerProxy::create([
            'type'         => CustomerType::ORGANIZATION,
            'company_name' => 'Market Palace Inc.',
            'tax_nr'       => '19995521'
        ]);

        $this->assertEquals('Market Palace Inc.', $mp->company_name);
        $this->assertEquals('19995521', $mp->tax_nr);
    }

    /** @test */
    public function customer_was_created_event_is_fired_on_create()
    {
        Event::fake();

        CustomerProxy::create([
            'type' => CustomerType::ORGANIZATION
        ]);

        Event::assertDispatched(CustomerWasCreated::class);
    }

    /**
     * @test
     */
    public function customer_was_created_event_contains_the_customer()
    {
        Event::fake();

        $mp = CustomerProxy::create([
            'type'         => CustomerType::ORGANIZATION,
            'company_name' => 'Market Palace Inc.',
            'tax_nr'       => '19995521'
        ]);

        Event::assertDispatched(CustomerWasCreated::class, function ($event) use ($mp) {
            return $event->getCustomer()->id   == $mp->id
                && $event->getCustomer()->name == $mp->name;
        });
    }

    /** @test */
    public function timezone_can_be_set()
    {
        $bamakan = Customer::create([
            'timezone' => 'Asia/Tehran',
        ])->fresh();

        $this->assertEquals('Asia/Tehran', $bamakan->timezone);
    }

    /** @test */
    public function currency_can_be_set()
    {
        $japanese = Customer::create([
            'currency' => 'JPY',
        ])->fresh();

        $this->assertEquals('JPY', $japanese->currency);
    }

    /** @test */
    public function lifetime_value_can_be_set()
    {
        $japanese = Customer::create([
            'ltv' => 2700.35,
        ])->fresh();

        $this->assertEquals(2700.35, $japanese->ltv);
        $this->assertIsFloat($japanese->ltv);
    }
}
