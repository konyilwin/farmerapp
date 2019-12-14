<?php

use Illuminate\Database\Seeder;

use App\Division;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                "name" => "Yangon",
                "created_at" => "2019-10-03 09:54:14",
                "updated_at" => "2019-10-03 09:54:14",
            ],
            [
                "name" => "Bago",
                "created_at" => "2019-10-03 09:54:14",
                "updated_at" => "2019-10-03 09:54:14",
            ],
            [
                "name" => "Madalay",
                "created_at" => "2019-10-03 09:54:14",
                "updated_at" => "2019-10-03 09:54:14",
            ]
        ];

        Division::insert($data);
    }
}
