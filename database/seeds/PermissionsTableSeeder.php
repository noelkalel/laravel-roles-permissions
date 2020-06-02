<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'name' => 'permission_create',
            ],
            [
                'id'    => '2',
                'name' => 'permission_edit',
            ],
            [
                'id'    => '3',
                'name' => 'permission_show',
            ],
            [
                'id'    => '4',
                'name' => 'permission_delete',
            ],
            [
                'id'    => '5',
                'name' => 'permission_access',
            ],
            [
                'id'    => '6',
                'name' => 'role_create',
            ],
            [
                'id'    => '7',
                'name' => 'role_edit',
            ],
            [
                'id'    => '8',
                'name' => 'role_show',
            ],
            [
                'id'    => '9',
                'name' => 'role_delete',
            ],
            [
                'id'    => '10',
                'name' => 'role_access',
            ],
            [
                'id'    => '11',
                'name' => 'user_create',
            ],
            [
                'id'    => '12',
                'name' => 'user_edit',
            ],
            [
                'id'    => '13',
                'name' => 'user_show',
            ],
            [
                'id'    => '14',
                'name' => 'user_delete',
            ],
            [
                'id'    => '15',
                'name' => 'user_access',
            ]
        ];

        Permission::insert($permissions);
    }
}
