<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin'
            ],
            [
                'name' => 'admin'
            ]
        );

        $role_user = Role::updateOrCreate(
            [
                'name' => 'user'
            ],
            [
                'name' => 'user'
            ]
        );

        $read_driver = Permission::updateOrCreate([
            'name' => 'read_driver'
        ], [
            'name' => 'read_driver'
        ]);

        $read_car = Permission::updateOrCreate([
            'name' => 'read_car'
        ], [
            'name' => 'read_car'
        ]);

        $update_payment = Permission::updateOrCreate([
            'name' => 'update_payment'
        ], [
            'name' => 'update_payment'
        ]);


        $crud_admin = Permission::updateOrCreate([
            'name' => 'CRUD_car_driver'
        ], [
            'name' => 'CRUD_car_driver'
        ]);

        $crud_user = Permission::updateOrCreate([
            'name' => 'CRUD_profile_payment'
        ], [
            'name' => 'CRUD_profile_payment'
        ]);

        $role_admin->givePermissionTo($update_payment);
        $role_admin->givePermissionTo($crud_admin);
        $role_user->givePermissionTo($read_car);
        $role_user->givePermissionTo($read_driver);
        $role_user->givePermissionTo($crud_user);
        
        $user=User::find(1);
        $user->assignRole('admin');
    }
}
