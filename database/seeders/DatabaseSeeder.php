<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
          RegionSeeder::class,
          ActivitySphereSeeder::class,
          InvestorSeeder::class,
          EntrepreneurSeeder::class,
          ProjectSeeder::class,
          RolesAndPermissionsSeeder::class
        ]);

        User::factory()->create([
          'name' => 'Admin',
          'email' => 'admin@admin.com',
        ])->assignRole('admin');
        User::factory()->create([
          'name' => 'User',
          'email' => 'user@user.com',
        ])->assignRole('user');

        User::factory(100)->create()->each(function ($user) {
            // Проверка, чтобы не назначать роль администратора случайным пользователям
            $user->assignRole('user');
        });
    }
}
