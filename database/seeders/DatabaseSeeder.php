<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
          'name' => 'Admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('password'),
          'email_verified_at' => now(),
        ]);
        User::factory(100)->create();
        $this->call([
          RegionSeeder::class,
          ActivitySphereSeeder::class,
          InvestorSeeder::class,
          EntrepreneurSeeder::class
        ]);
    }
}
