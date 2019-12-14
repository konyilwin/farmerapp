<?php

use Illuminate\Database\Seeder;

use App\City;

class CitiesTableSeeder extends Seeder
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
                "division_id" => 1,
                "name" => "Yangon"
            ],
            [
                "division_id" => 2,
                "name" => "Bago"
            ],
            [
                "division_id" => 3,
                "name" => "Mandalay"
            ]
        ];

        City::insert($data);
    }
}
