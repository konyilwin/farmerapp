<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$tqFNAFISxJyXwkdpCzv0DuNNdOUnokdHv8ieTWA/q6q8xIAz.JWL.',
                'remember_token' => null,
                'created_at'     => '2019-10-03 09:50:46',
                'updated_at'     => '2019-10-03 09:50:46',
            ],
        ];

        User::insert($users);
    }
}
