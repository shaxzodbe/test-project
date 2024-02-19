<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
          'Andijan Region',
          'Bukhara Region',
          'Fergana Region',
          'Jizzakh Region',
          'Khorezm Region',
          'Namangan Region',
          'Navoiy Region',
          'Kashkadarya Region',
          'Samarkand Region',
          'Syrdarya Region',
          'Surkhandarya Region',
          'Tashkent Region',
          'Republic of Karakalpakstan',
          'Tashkent city',
        ];

        foreach ($regions as $region) {
            Region::create(['title' => $region]);
        }
    }
}
