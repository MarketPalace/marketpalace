<?php

namespace App\Ship\Seeders;

use App\Containers\MarketPalace\Address\Data\Seeders\CountiesOfHungary;
use App\Containers\MarketPalace\Address\Data\Seeders\CountiesOfRomania;
use App\Containers\MarketPalace\Address\Data\Seeders\Countries;
use App\Containers\MarketPalace\Address\Data\Seeders\ProvincesAndRegionsOfBelgium;
use App\Containers\MarketPalace\Address\Data\Seeders\ProvincesOfIndonesia;
use App\Containers\MarketPalace\Address\Data\Seeders\ProvincesOfNetherlands;
use App\Containers\MarketPalace\Address\Data\Seeders\StatesAndTerritoriesOfIndia;
use App\Containers\MarketPalace\Address\Data\Seeders\StatesOfGermany;
use App\Containers\MarketPalace\Address\Data\Seeders\StatesOfUsa;
use App\Ship\Parents\Seeders\Seeder;

class   SeedTestingData extends Seeder
{
    /**
     * Note: This seeder is not loaded automatically by Apiato
     * This is a special seeder which can be called by "apiato:seed-test" command
     * It is useful for seeding testing data.
     */
    public function run(): void
    {
        // Create Testing data for live tests
        $this->call(Countries::class);
        $this->call(ProvincesAndRegionsOfBelgium::class);
        $this->call(ProvincesOfIndonesia::class);
        $this->call(ProvincesOfNetherlands::class);
        $this->call(CountiesOfHungary::class);
        $this->call(CountiesOfRomania::class);
        $this->call(StatesAndTerritoriesOfIndia::class);
        $this->call(StatesOfGermany::class);
        $this->call(StatesOfUsa::class);

    }
}
