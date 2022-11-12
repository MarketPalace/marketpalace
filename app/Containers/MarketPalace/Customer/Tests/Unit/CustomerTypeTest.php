<?php
/**
 * Contains the CustomerTypeTest class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Customer\Tests\Unit;

use App\Containers\MarketPalace\Customer\Contracts\CustomerType as CustomerTypeContract;
use App\Containers\MarketPalace\Customer\Enums\CustomerType;
use App\Containers\MarketPalace\Customer\Enums\CustomerTypeProxy;
use App\Containers\MarketPalace\Customer\Models\CustomerProxy;
use App\Containers\MarketPalace\Customer\Tests\TestCase;
use App\Ship\Utils\Enum;

class CustomerTypeTest extends TestCase
{
    /**
     * @test
     */
    public function can_be_instantiated()
    {
        $type = new CustomerType();
        $this->assertNotNull($type);
        $this->assertEquals(CustomerType::__DEFAULT, $type->value());

        $org = CustomerType::ORGANIZATION();
        $this->assertTrue($org->equals(CustomerTypeProxy::ORGANIZATION()));

        $individual = CustomerType::INDIVIDUAL();
        $this->assertTrue($individual->equals(CustomerTypeProxy::INDIVIDUAL()));
    }

    /**
     * @test
     */
    public function customer_type_is_an_enum()
    {
        $customer = CustomerProxy::create([])->fresh();

        $this->assertInstanceOf(CustomerTypeContract::class, $customer->type);
        $this->assertInstanceOf(Enum::class, $customer->type);
    }
}
