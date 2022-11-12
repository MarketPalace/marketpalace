<?php
/**
 * Contains the UpdateTest class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Tests\Unit;

use App\Containers\MarketPalace\Customer\Tests\TestCase;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use App\Containers\MarketPalace\Customer\Events\CustomerTypeWasChanged;
use App\Containers\MarketPalace\Customer\Events\CustomerWasUpdated;
use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Containers\MarketPalace\Customer\Enums\CustomerType;

class UpdateTest extends TestCase
{
    /**
     * @test
     */
    public function customer_was_updated_event_is_fired_on_update()
    {
        Event::fake();

        $customer = Customer::create([
            'company_name' => 'Market Palace Ltd.',
            'type'         => CustomerType::ORGANIZATION
        ]);

        $customer->update([
            'email' => 'aboozar@marketpalace.io'
        ]);

        Event::assertDispatched(CustomerWasUpdated::class);
    }

    /**
     * @test
     */
    public function customer_was_updated_event_contains_the_model_on_update()
    {
        Event::fake();

        $acme = Customer::create([
            'company_name' => 'Market Palace Inc.',
            'type'         => CustomerType::ORGANIZATION
        ]);

        $acme->update(['company_name' => 'Events Dispatch Ltd.']);

        Event::assertDispatched(CustomerWasUpdated::class, function ($event) use ($acme) {
            return $event->getCustomer()->id   == $acme->id
                && 'Events Dispatch Ltd.' == $event->getCustomer()->getName();
        });
    }

    /**
     * @test
     */
    public function org_customer_type_can_be_converted_to_individual()
    {
        $mp = Customer::create([
            'company_name' => 'Market Palace Inc.',
            'type'         => CustomerType::ORGANIZATION
        ]);

        $mp->update([
            'type'      => CustomerType::INDIVIDUAL,
            'firstname' => 'Aboozar',
            'lastname'  => 'Ghaffari'
        ]);

        $aboozar = $mp->fresh();

        $this->assertEquals(CustomerType::INDIVIDUAL, $aboozar->type->value());
        $this->assertEquals('Aboozar', $aboozar->firstname);
        $this->assertEquals('Ghaffari', $aboozar->lastname);
        $this->assertEquals('Aboozar Ghaffari', $aboozar->getName());
    }

    /**
     * @test
     */
    public function individual_customer_type_can_be_converted_to_organization()
    {
        $john = Customer::create([
            'type'      => CustomerType::INDIVIDUAL,
            'firstname' => 'John',
            'lastname'  => 'Doe'
        ]);

        $john->update([
            'company_name' => 'Acme Inc.',
            'type'         => CustomerType::ORGANIZATION
        ]);

        $acme = $john->fresh();

        $this->assertEquals(CustomerType::ORGANIZATION, $acme->type->value());
        $this->assertEquals('Acme Inc.', $acme->company_name);
        $this->assertEquals('Acme Inc.', $acme->getName());
    }

    /**
     * @test
     */
    public function customer_type_was_changed_event_is_fired_on_type_conversion()
    {
        /** @see https://github.com/laravel/framework/issues/18066#issuecomment-342630971 */
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $john = Customer::create([
            'type'      => CustomerType::INDIVIDUAL,
            'firstname' => 'John',
            'lastname'  => 'Doe'
        ]);

        $john->update([
            'company_name' => 'Customers Sometimes Change Their Name Inc.',
            'type'         => CustomerType::ORGANIZATION
        ]);

        Event::assertDispatched(CustomerTypeWasChanged::class);
    }

    /**
     * @test
     */
    public function customer_type_was_changed_event_contains_necessary_data_when_converting()
    {
        // https://github.com/laravel/framework/issues/18066#issuecomment-342630971
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $johnAttrs = [
            'firstname' => 'John',
            'lastname'  => 'Doe',
            'type'      => CustomerType::INDIVIDUAL
        ];

        $john = Customer::create($johnAttrs);

        $john->update([
            'company_name' => 'Company Ltd.',
            'type'         => CustomerType::ORGANIZATION
        ]);

        $company = $john->fresh();

        Event::assertDispatched(CustomerTypeWasChanged::class, function ($event) use ($johnAttrs, $company) {
            return $event->getCustomer()->id   == $company->id
                && 'Company Ltd.' == $event->getCustomer()->getName()
                && CustomerType::INDIVIDUAL()->equals($event->fromType)
                && $event->oldAttributes['firstname'] == $johnAttrs['firstname']
                && $event->oldAttributes['lastname'] == $johnAttrs['lastname'];
        });
    }
}
