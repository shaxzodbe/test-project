<?php

namespace Database\Seeders;

use App\Models\Entrepreneur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrepreneurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entrepreneur::factory(100)->create();
    }
}
