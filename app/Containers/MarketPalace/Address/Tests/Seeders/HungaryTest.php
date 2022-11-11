<?php
/**
 * Contains the HungaryTest class.
 *
 * @copyright   Copyright (c) 2019 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2019-08-11
 *
 */

namespace App\Containers\MarketPalace\Address\Tests\Seeders;

use App\Containers\MarketPalace\Address\Data\Seeders\CountiesOfHungary;
use App\Containers\MarketPalace\Address\Data\Seeders\Countries;
use App\Containers\MarketPalace\Address\Models\Country;
use App\Containers\MarketPalace\Address\Models\Province;
use App\Containers\MarketPalace\Address\Tests\TestCase;
use Illuminate\Foundation\Application;

class HungaryTest extends TestCase
{
    /** @var Country */
    private $hungary;

    /** @test */
    public function the_country_is_present()
    {
        $this->assertEquals('Hungary', $this->hungary->name);
    }

    /** @test */
    public function has_all_of_its_20_counties()
    {
        $countiesOfHungary = Province::byCountry($this->hungary)->get();
        $this->assertCount(20, $countiesOfHungary);

        $names = $countiesOfHungary->map(function ($county) {
            return $county->name;
        });

        $this->assertContains('Baranya', $names);
        $this->assertContains('Bács-Kiskun', $names);
        $this->assertContains('Békés', $names);
        $this->assertContains('Borsod-Abaúj-Zemplén', $names);
        $this->assertContains('Budapest', $names);
        $this->assertContains('Csongrád', $names);
        $this->assertContains('Fejér', $names);
        $this->assertContains('Győr-Moson-Sopron', $names);
        $this->assertContains('Hajdú-Bihar', $names);
        $this->assertContains('Heves', $names);
        $this->assertContains('Jász-Nagykun-Szolnok', $names);
        $this->assertContains('Komárom-Esztergom', $names);
        $this->assertContains('Nógrád', $names);
        $this->assertContains('Pest', $names);
        $this->assertContains('Somogy', $names);
        $this->assertContains('Szabolcs-Szatmár-Bereg', $names);
        $this->assertContains('Tolna', $names);
        $this->assertContains('Vas', $names);
        $this->assertContains('Veszprém', $names);
        $this->assertContains('Zala', $names);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->hungary = Country::find('HU');
    }

    protected function setUpDatabase(Application $app)
    {
        parent::setUpDatabase($app);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => CountiesOfHungary::class]);
    }
}
