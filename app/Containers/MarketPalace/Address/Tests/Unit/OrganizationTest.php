<?php
/**
 * Contains the OrganizationTest class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Tests\Unit;

use App\Containers\MarketPalace\Address\Contracts\Organization as OrganizationContract;
use App\Containers\MarketPalace\Address\Models\Organization;
use App\Containers\MarketPalace\Address\Tests\TestCase;

class OrganizationTest extends TestCase
{
    /**
     * @test
     */
    public function can_be_instantiated()
    {
        $org = new Organization();

        $this->assertInstanceOf(Organization::class, $org);
    }

    /**
     * @test
     */
    public function implements_the_organization_interface()
    {
        $person = new Organization();

        $this->assertInstanceOf(OrganizationContract::class, $person);
    }

    /**
     * @test
     */
    public function can_be_created_with_minimal_data()
    {
        $jetbrains = Organization::create([
            'name' => 'JetBrains s.r.o.'
        ]);

        $this->assertInstanceOf(Organization::class, $jetbrains);

        $jetbrains = $jetbrains->fresh();

        $this->assertEquals('JetBrains s.r.o.', $jetbrains->name);
        $this->assertNotNull($jetbrains->id);
    }

    /**
     * @test
     */
    public function all_fields_can_be_set()
    {
        $startAlliance = Organization::create([
            'name'            => 'Berlin Partner für Wirtschaft und Technologie GmbH',
            'tax_nr'          => 'DE136629780',
            'registration_nr' => 'HRB 13072 B',
            'email'           => 'lukas.engenbach@berlin-partner.de',
            'phone'           => '+49 30 46302-599'
        ]);

        $startAlliance = $startAlliance->fresh();

        $this->assertEquals('Berlin Partner für Wirtschaft und Technologie GmbH', $startAlliance->name);
        $this->assertEquals('DE136629780', $startAlliance->tax_nr);
        $this->assertEquals('HRB 13072 B', $startAlliance->registration_nr);
        $this->assertEquals('lukas.engenbach@berlin-partner.de', $startAlliance->email);
        $this->assertEquals('+49 30 46302-599', $startAlliance->phone);
    }
}
