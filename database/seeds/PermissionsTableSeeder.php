<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-05-13 11:17:35',
            'updated_at' => '2019-05-13 11:17:35',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '17',
                'title'      => 'audit_log_show',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '18',
                'title'      => 'audit_log_access',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '19',
                'title'      => 'sample_access',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '20',
                'title'      => 'tag_create',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '21',
                'title'      => 'tag_edit',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '22',
                'title'      => 'tag_show',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '23',
                'title'      => 'tag_delete',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '24',
                'title'      => 'tag_access',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '25',
                'title'      => 'hospital_create',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '26',
                'title'      => 'hospital_edit',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '27',
                'title'      => 'hospital_show',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '28',
                'title'      => 'hospital_delete',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '29',
                'title'      => 'hospital_access',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '30',
                'title'      => 'example_create',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '31',
                'title'      => 'example_edit',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '32',
                'title'      => 'example_show',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '33',
                'title'      => 'example_delete',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ],
            [
                'id'         => '34',
                'title'      => 'example_access',
                'created_at' => '2019-05-13 11:17:35',
                'updated_at' => '2019-05-13 11:17:35',
            ]];

        Permission::insert($permissions);
    }
}
