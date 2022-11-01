<?php
/**
 * Contains the ProvinceTest class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Tests\Unit;

use Illuminate\Database\QueryException;
use App\Containers\MarketPalace\Address\Contracts\Country as CountryContract;
use App\Containers\MarketPalace\Address\Contracts\Province as ProvinceContract;
use App\Containers\MarketPalace\Address\Models\Country;
use App\Containers\MarketPalace\Address\Models\Province;
use App\Containers\MarketPalace\Address\Enums\ProvinceType;
use App\Containers\MarketPalace\Address\Tests\TestCase;

class ProvinceTest extends TestCase
{
    /** @test */
    public function province_type_is_the_proper_enum_type()
    {
        $cluj = Province::findByCountryAndCode('RO', 'CJ');
        $this->assertInstanceOf(ProvinceType::class, $cluj->type);

        $this->assertTrue(
            $cluj->type->equals(ProvinceType::COUNTY()),
            sprintf('Cluj should be a %s but is a "%s"', ProvinceType::COUNTY, $cluj->type)
        );
    }

    /** @test */
    public function is_aware_of_its_country()
    {
        $cluj    = Province::findByCountryAndCode('RO', 'CJ');
        $romania = Country::find('RO');

        $this->assertInstanceOf(CountryContract::class, $cluj->country);
        $this->assertEquals($romania->id, $cluj->country->id);
    }

    /** @test */
    public function can_be_created_with_create_method()
    {
        $ciongrad = Province::create([
            'country_id' => 'RO',
            'type'       => ProvinceType::COUNTY,
            'code'       => 'CI',
            'name'       => 'Ciongrad'
        ]);

        $this->assertNotEmpty($ciongrad->id);

        $ciongrad->fresh();

        $this->assertEquals('CI', $ciongrad->code);
        $this->assertTrue($ciongrad->type->equals(ProvinceType::COUNTY()));
    }

    /** @test */
    public function province_type_can_be_changed_via_plain_string()
    {
        $bichis = Province::create([
            'country_id' => 'RO',
            'type'       => ProvinceType::COUNTY,
            'code'       => 'BI',
            'name'       => 'Bichis'
        ]);

        $this->assertNotEmpty($bichis->id);

        $bichis->type = ProvinceType::MILITARY;
        $bichis->save();

        $this->assertTrue($bichis->type->equals(ProvinceType::MILITARY()));
    }

    /** @test */
    public function province_type_can_be_set_with_enum()
    {
        $haiduc = Province::create([
            'country_id' => 'RO',
            'type'       => ProvinceType::COUNTY(),
            'code'       => 'HA',
            'name'       => 'Haiduc'
        ]);

        $this->assertNotEmpty($haiduc->id);

        $haiduc->type = ProvinceType::MILITARY();
        $haiduc->save();

        $this->assertTrue($haiduc->type->equals(ProvinceType::MILITARY()));
    }

    /** @test */
    public function province_can_be_retrieved_by_country_and_code()
    {
        $brasov = Province::findByCountryAndCode('RO', 'BV');

        $this->assertInstanceOf(ProvinceContract::class, $brasov);
        $this->assertEquals('RO', $brasov->country_id);
        $this->assertEquals('BV', $brasov->code);
    }

    /** @test */
    public function find_by_country_and_code_accepts_country_object_as_first_parameter()
    {
        $cluj = Province::findByCountryAndCode(Country::find('RO'), 'CJ');

        $this->assertInstanceOf(ProvinceContract::class, $cluj);
        $this->assertEquals('RO', $cluj->country_id);
        $this->assertEquals('CJ', $cluj->code);
    }

    /** @test */
    public function find_by_country_and_code_returns_null_on_nonexistent()
    {
        $inexistent = Province::findByCountryAndCode('RO', 'VW');

        $this->assertNull($inexistent);
    }

    /** @test */
    public function provinces_can_be_returned_by_country()
    {
        $this->assertCount(20, Province::byCountry('HU')->get());

        $hungary = Country::find('HU');
        $this->assertCount(20, Province::byCountry($hungary)->get());
    }

    /** @test */
    public function country_and_province_code_combination_is_unique()
    {
        Province::create(['country_id' => 'ID', 'name' => 'Whaat?', 'code' => 'WWW']);
        $this->expectException(QueryException::class);
        Province::create(['country_id' => 'ID', 'name' => 'Puaaff', 'code' => 'WWW']);
    }
}
