<?php
/**
 * Contains the CustomerNameTest class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Tests\Unit;

use App\Containers\MarketPalace\Customer\Tests\TestCase;
use App\Containers\MarketPalace\Customer\Models\Customer;
use App\Containers\MarketPalace\Customer\Enums\CustomerType;

class CustomerNameTest extends TestCase
{
    /**
     * @test
     */
    public function get_name_method_properly_returns_company_name()
    {
        $fooBarInc = Customer::create([
            'type'         => CustomerType::ORGANIZATION,
            'company_name' => 'Foo Bar Inc.'
        ]);

        $this->assertEquals('Foo Bar Inc.', $fooBarInc->getName());

        $fooBarInc->company_name = 'Baz Bang Ltd.';

        $this->assertEquals('Baz Bang Ltd.', $fooBarInc->getName());

        $fooBarInc->save();
        $this->assertEquals('Baz Bang Ltd.', $fooBarInc->getName());

        $fooBarInc = $fooBarInc->fresh();
        $this->assertEquals('Baz Bang Ltd.', $fooBarInc->getName());
    }

    /**
     * @test
     */
    public function get_name_returns_company_name_on_a_customer_having_person_name_but_being_organization()
    {
        $mpAboozarGhaffari = Customer::create([
            'firstname'    => 'Aboozar',
            'lastname'     => 'Ghaffari',
            'company_name' => 'Market Palace Inc.'
        ]);

        $this->assertEquals('Market Palace Inc.', $mpAboozarGhaffari->getName());
        $this->assertEquals('Aboozar', $mpAboozarGhaffari->firstname);
        $this->assertEquals('Ghaffari', $mpAboozarGhaffari->lastname);
    }

    /**
     * @test
     */
    public function get_name_returns_first_and_last_name_for_individual_customers()
    {
        $aboozar = Customer::create([
            'firstname' => 'Aboozar',
            'lastname'  => 'Ghaffari',
            'type'      => CustomerType::INDIVIDUAL
        ]);

        $this->assertEquals('Aboozar Ghaffari', $aboozar->getName());
        $this->assertEquals('Aboozar', $aboozar->firstname);
        $this->assertEquals('Ghaffari', $aboozar->lastname);
    }
}
