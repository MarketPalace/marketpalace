<?php
/**
 * Contains the AddressTypeTest class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Tests\Unit;

use App\Containers\MarketPalace\Address\Enums\AddressType;
use App\Containers\MarketPalace\Address\Tests\TestCase;

class AddressTypeTest extends TestCase
{
    /**
     * @test
     */
    public function can_be_instantiated()
    {
        $type = new AddressType();

        $this->assertNotNull($type);
        $this->assertEquals(AddressType::defaultValue(), $type->value());

        $shipping = AddressType::SHIPPING();
        $this->assertTrue($shipping->equals(AddressType::SHIPPING()));

        $billing = AddressType::BILLING();
        $this->assertTrue($billing->equals(AddressType::BILLING()));

        $this->assertInstanceOf(AddressType::class, AddressType::create());
    }

    /**
     * @test
     */
    public function default_value_is_undefined()
    {
        $undefined = AddressType::create();

        $this->assertEquals(AddressType::UNDEFINED, $undefined->value());
    }
}
