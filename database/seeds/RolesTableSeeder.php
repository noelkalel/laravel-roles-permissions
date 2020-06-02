<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'name' => 'admin',
            ],
            [
                'id'    => 2,
                'name' => 'user',
            ],
        ];

        Role::insert($roles);
    }
}