<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //delete/update/view/
        $permissions = [
            'invoices-list',
            'invoices-update',
            'invoices-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $role1 =   Role::create(['name' => 'super Admin']);
        $role1->givePermissionTo('invoices-list');
        $role1->givePermissionTo('invoices-update');
        $role1->givePermissionTo('invoices-delete');
        $role1->givePermissionTo('role-list');
        $role1->givePermissionTo('role-create');
        $role1->givePermissionTo('role-delete');
        $role1->givePermissionTo('role-edit');
        $role1->givePermissionTo('user-list');
        $role1->givePermissionTo('user-edit');
        $role1->givePermissionTo('user-create');
        $role1->givePermissionTo('user-delete');
        User::first()->assignRole($role1);
    }
}
