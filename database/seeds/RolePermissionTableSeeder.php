<?php

use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{
    public function run()
    {
        $adminPermissions = Permission::all();

        Role::findOrFail(1)->permissions()->sync($adminPermissions->pluck('id'));
    }
}
