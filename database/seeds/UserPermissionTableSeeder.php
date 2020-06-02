<?php

use App\User;
use App\Permission;
use Illuminate\Database\Seeder;

class UserPermissionTableSeeder extends Seeder
{
    public function run()
    {
        $adminPermissions = Permission::all();

        User::findOrFail(1)->permissions()->sync($adminPermissions->pluck('id'));
    }
}