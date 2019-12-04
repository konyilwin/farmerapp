<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'         => 1,
                'title'      => 'Admin',
                'created_at' => '2019-10-03 09:50:46',
                'updated_at' => '2019-10-03 09:50:46',
            ],
            [
                'id'         => 2,
                'title'      => 'User',
                'created_at' => '2019-10-03 09:50:46',
                'updated_at' => '2019-10-03 09:50:46',
            ],
        ];

        Role::insert($roles);
    }
}
