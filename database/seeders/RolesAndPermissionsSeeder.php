<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Определение сущностей и соответствующих CRUD операций
        $entities = ['activity spheres', 'entrepreneurs', 'permissions', 'investors', 'projects', 'regions', 'roles', 'users'];
        $operations = ['create', 'read', 'update', 'delete'];

        // Создание разрешений для каждой сущности и операции
        foreach ($entities as $entity) {
            foreach ($operations as $operation) {
                $permissionName = "{$operation} {$entity}";
                Permission::create(['name' => $permissionName]);
            }
        }

        // Создание роли Admin и назначение ей всех разрешений
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        // Создание роли User и назначение ей ограниченного набора разрешений
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
          'create entrepreneurs',
          'read entrepreneurs',
          'update entrepreneurs',
          'delete entrepreneurs',
          'create projects',
          'read projects',
          'update projects',
          'delete projects'
        ]);
    }
}
