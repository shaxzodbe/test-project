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
          'Андижанская область',
          'Бухарская область',
          'Джизакская область',
          'Кашкадарьинская область',
          'Навоийская область',
          'Наманганская область',
          'Самаркандская область',
          'Сурхандарьинская область',
          'Сырдарьинская область',
          'Ташкентская область',
          'Ферганская область',
          'Хорезмская область',
          'Республика Каракалпакстан',
          'Город Ташкент',
        ];

        foreach ($regions as $region) {
            Region::create(['title' => $region]);
        }
    }
}
