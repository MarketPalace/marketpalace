<?php
/**
 * Contains the NetherlandsTest class.
 *
 * @copyright   Copyright (c) 2019 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2019-08-11
 *
 */

namespace App\Containers\MarketPalace\Address\Tests\Seeders;

use App\Containers\MarketPalace\Address\Models\Country;
use App\Containers\MarketPalace\Address\Models\Province;
use App\Containers\MarketPalace\Address\Data\Seeders\Countries;
use App\Containers\MarketPalace\Address\Data\Seeders\ProvincesOfNetherlands;
use App\Containers\MarketPalace\Address\Tests\TestCase;
use Illuminate\Foundation\Application;

class NetherlandsTest extends TestCase
{
    /** @var Country */
    private $netherlands;

    protected function setUp(): void
    {
        parent::setUp();

        $this->netherlands = Country::find('NL');
    }

    /** @test */
    public function the_country_is_present()
    {
        $this->assertEquals('Netherlands', $this->netherlands->name);
    }

    /** @test */
    public function has_all_of_its_12_provinces()
    {
        $provincesOfNetherlands = Province::byCountry($this->netherlands)->get();
        $this->assertCount(12, $provincesOfNetherlands);

        $names = $provincesOfNetherlands->map(function ($state) {
            return $state->name;
        });

        $this->assertContains('Drenthe', $names);
        $this->assertContains('Flevoland', $names);
        $this->assertContains('Friesland', $names);
        $this->assertContains('Gelderland', $names);
        $this->assertContains('Groningen', $names);
        $this->assertContains('Limburg', $names);
        $this->assertContains('Noord-Brabant', $names);
        $this->assertContains('Noord-Holland', $names);
        $this->assertContains('Overijssel', $names);
        $this->assertContains('Utrecht', $names);
        $this->assertContains('Zeeland', $names);
        $this->assertContains('Zuid-Holland', $names);
    }

    protected function setUpDatabase(Application $app)
    {
        parent::setUpDatabase($app);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => ProvincesOfNetherlands::class]);
    }
}
