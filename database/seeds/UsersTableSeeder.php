<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$0Q0.xYEpiQjRXirhqohB4uMEsSqltqEuW58TCDc/VjE.BiVQC2K0e',
            'remember_token' => null,
            'created_at'     => '2019-05-10 17:44:57',
            'updated_at'     => '2019-05-10 17:44:57',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
