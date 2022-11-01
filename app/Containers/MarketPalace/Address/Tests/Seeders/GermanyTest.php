<?php
/**
 * Contains the GermanyTest class.
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
use App\Containers\MarketPalace\Address\Data\Seeders\StatesOfGermany;
use App\Containers\MarketPalace\Address\Tests\TestCase;

class GermanyTest extends TestCase
{
    /** @var Country */
    private $germany;

    protected function setUp(): void
    {
        parent::setUp();

        $this->germany = Country::find('DE');
    }

    /** @test */
    public function the_country_is_present()
    {
        $this->assertEquals('Germany', $this->germany->name);
    }

    /** @test */
    public function has_all_of_its_16_states()
    {
        $statesOfGermany = Province::byCountry($this->germany)->get();
        $this->assertCount(16, $statesOfGermany);

        $names = $statesOfGermany->map(function ($state) {
            return $state->name;
        });

        $this->assertContains('Baden-Württemberg', $names);
        $this->assertContains('Bayern', $names);
        $this->assertContains('Berlin', $names);
        $this->assertContains('Brandenburg', $names);
        $this->assertContains('Bremen', $names);
        $this->assertContains('Hamburg', $names);
        $this->assertContains('Hessen', $names);
        $this->assertContains('Mecklenburg-Vorpommern', $names);
        $this->assertContains('Niedersachsen', $names);
        $this->assertContains('Nordrhein-Westfalen', $names);
        $this->assertContains('Rheinland-Pfalz', $names);
        $this->assertContains('Saarland', $names);
        $this->assertContains('Sachsen', $names);
        $this->assertContains('Sachsen-Anhalt', $names);
        $this->assertContains('Schleswig-Holstein', $names);
        $this->assertContains('Thüringen', $names);
    }

    protected function setUpDatabase($application)
    {
        parent::setUpDatabase($application);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => StatesOfGermany::class]);
    }
}
