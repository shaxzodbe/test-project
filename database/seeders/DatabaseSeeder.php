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
        $admin = User::factory()->create([
          'name' => 'Admin',
          'email' => 'admin@admin.com',
        ]);
        User::factory()->create([
          'name' => 'User',
          'email' => 'user@user.com',
        ]);
        $role = Role::create(['name' => 'Admin']);
        $admin->assignRole($role);

        User::factory(100)->create();
        $this->call([
          RegionSeeder::class,
          ActivitySphereSeeder::class,
          InvestorSeeder::class,
          EntrepreneurSeeder::class,
          ProjectSeeder::class
        ]);
    }
}
