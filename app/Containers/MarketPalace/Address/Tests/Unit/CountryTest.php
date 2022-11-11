<?php
/**
 * Contains the CountryTest class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Tests\Unit;

use App\Containers\MarketPalace\Address\Contracts\Country as CountryContract;
use App\Containers\MarketPalace\Address\Models\Country;
use App\Containers\MarketPalace\Address\Tests\TestCase;

class CountryTest extends TestCase
{
    /** @var  Country */
    protected Country $usa;

    /** @var  Country */
    protected Country $uk;

    /** @var  Country */
    protected Country $romania;

    /** @var  Country */
    protected Country $germany;

    protected function setUp(): void
    {
        parent::setUp();

        $this->usa     = Country::find('US');
        $this->uk      = Country::find('GB');
        $this->romania = Country::find('RO');
        $this->germany = Country::find('DE');
    }

    /**
     * @test
     */
    public function countries_can_be_found_by_their_iso_code()
    {
        $this->assertInstanceOf(CountryContract::class, $this->usa);
        $this->assertInstanceOf(CountryContract::class, $this->romania);
        $this->assertInstanceOf(CountryContract::class, $this->germany);
        $this->assertInstanceOf(CountryContract::class, $this->uk);
    }

    /**
     * @test
     */
    public function country_properly_retrieves_its_provinces()
    {
        $this->assertCount(50, $this->usa->states);

        $this->assertCount(42, $this->romania->provinces);
        $this->assertCount(0, $this->romania->states);
        $this->assertCount(42, $this->romania->counties);
    }

    /**
     * @test
     */
    public function eu_countries_have_the_eu_flag_on()
    {
        $this->assertTrue($this->romania->is_eu_member);
        $this->assertTrue($this->germany->is_eu_member);
        $this->assertFalse($this->usa->is_eu_member);
    }
}
