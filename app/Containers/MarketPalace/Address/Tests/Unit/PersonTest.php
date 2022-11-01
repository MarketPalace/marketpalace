<?php
/**
 * Contains the PersonTest class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Tests\Unit;

use App\Containers\MarketPalace\Address\Contracts\Person as PersonContract;
use App\Containers\MarketPalace\Address\Enums\Gender;
use App\Containers\MarketPalace\Address\Enums\NameOrder;
use App\Containers\MarketPalace\Address\Models\Person;
use App\Ship\Utils\Enum;
use App\Containers\MarketPalace\Address\Tests\TestCase;

class PersonTest extends TestCase
{
    /**
     * @test
     */
    public function can_be_instantiated()
    {
        $person = new Person();

        $this->assertInstanceOf(Person::class, $person);
    }

    /**
     * @test
     */
    public function implements_the_person_interface()
    {
        $person = new Person();

        $this->assertInstanceOf(PersonContract::class, $person);
    }

    /**
     * @test
     */
    public function can_be_created_with_minimal_data()
    {
        $person = Person::create([
            'firstname' => 'John',
            'lastname'  => 'Smith'
        ]);

        $this->assertInstanceOf(Person::class, $person);

        $person = $person->fresh();

        $this->assertEquals('John', $person->firstname);
        $this->assertEquals('Smith', $person->lastname);
    }

    /**
     * @test
     */
    public function nameorder_defaults_to_western()
    {
        $person = Person::create([
            'firstname' => 'Charlie',
            'lastname'  => 'Firpo'
        ]);

        $this->assertInstanceOf(Person::class, $person);

        $person = $person->fresh();

        $this->assertInstanceOf(Enum::class, $person->nameorder);
        $this->assertTrue(NameOrder::create()->equals($person->nameorder));
        $this->assertTrue($person->nameorder->isWestern());
    }

    /**
     * @test
     */
    public function name_can_be_retrieved_in_proper_naming_order()
    {
        $johnny = Person::create([
            'firstname' => 'Johnny',
            'lastname'  => 'Firpo'

        ]);

        $this->assertEquals('Johnny Firpo', $johnny->getFullName());

        $puskas = Person::create([
            'firstname' => 'Ferenc',
            'lastname'  => 'Puskás',
            'nameorder' => NameOrder::EASTERN
        ]);

        $this->assertTrue($puskas->nameorder->isEastern(), 'Name order should be eastern');
        $this->assertEquals('Puskás Ferenc', $puskas->getFullName());

        $puskas = $puskas->fresh(); // Check if OK even after refetching from DB
        $this->assertTrue($puskas->nameorder->isEastern(), 'Name order should be eastern');
        $this->assertEquals('Puskás Ferenc', $puskas->getFullName());
    }

    /**
     * @test
     */
    public function nameorder_can_be_changed()
    {
        $soros = Person::create([
            'firstname' => 'György',
            'lastname'  => 'Soros',
        ]);

        $soros->nameorder = NameOrder::EASTERN;
        $soros->save();

        $this->assertTrue($soros->nameorder->isEastern());

        $soros->firstname = 'George';
        $soros->nameorder = NameOrder::WESTERN();
        $soros->save();

        $soros = $soros->fresh();

        $this->assertEquals('George', $soros->firstname);
        $this->assertTrue($soros->nameorder->isWestern());
    }

    /**
     * @test
     */
    public function gender_is_unknown_by_default()
    {
        $conchita = Person::create([
           'firstname' => 'Conchita',
           'lastname'  => 'Wurst'
        ]);

        $this->assertNull($conchita->gender->value());
        $this->assertTrue($conchita->gender->isUnknown());
    }

    /**
     * @test
     */
    public function gender_can_be_changed_by_enum_object()
    {
        $craigWood = Person::create([
            'firstname' => 'Robert Hardy',
            'lastname'  => 'Craig-Wood',
            'gender'    => Gender::MALE
        ]);

        $craigWood = $craigWood->fresh();

        $this->assertTrue($craigWood->gender->isMale());

        // Assume it's the 2008 coming out:

        $craigWood->firstname = 'Kate';
        $craigWood->gender    = Gender::FEMALE();
        $craigWood->save();

        $this->assertTrue($craigWood->gender->isFemale());
        $this->assertEquals('Kate', $craigWood->firstname);

        // Just dblcheck if data has really been persisted:
        $craigWood = $craigWood->fresh();
        $this->assertTrue($craigWood->gender->isFemale());
        $this->assertEquals('Kate', $craigWood->firstname);
    }

    /**
     * @test
     */
    public function gender_can_be_changed_via_string()
    {
        $craigWood = Person::create([
            'firstname' => 'Robert Hardy',
            'lastname'  => 'Craig-Wood'
        ]);

        $craigWood->gender = 'm';
        $craigWood->save();

        $this->assertTrue($craigWood->gender->isMale());
    }

    /**
     * @test
     */
    public function all_fields_can_be_set()
    {
        $chesley = Person::create([
            'firstname' => 'Chesley',
            'lastname'  => 'Sullenberger',
            'email'     => 'chesley1549@aa.com',
            'phone'     => '(541) 754-3010',
            'birthdate' => '1951-01-15',
            'gender'    => Gender::MALE,
            'nin'       => '999-01-0001'
        ]);

        $chesley = $chesley->fresh();

        $this->assertEquals('Chesley', $chesley->firstname);
        $this->assertEquals('Sullenberger', $chesley->lastname);
        $this->assertEquals('chesley1549@aa.com', $chesley->email);
        $this->assertEquals('(541) 754-3010', $chesley->phone);

        $this->assertInstanceOf(\DateTime::class, $chesley->birthdate);
        $this->assertEquals('1951-01-15', $chesley->birthdate->format('Y-m-d'));

        $this->assertTrue($chesley->gender->isMale());

        $this->assertEquals('999-01-0001', $chesley->nin);
    }
}
