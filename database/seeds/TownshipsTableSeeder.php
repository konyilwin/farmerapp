<?php

use Illuminate\Database\Seeder;

use App\Township;

class TownshipsTableSeeder extends Seeder
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
                "city_id" => 1,
                "name" => "Ahlon"
            ],
            [
                "division_id" => 1,
                "city_id" => 1,
                "name" => "Bahan"
            ],
            [
                "division_id" => 1,
                "city_id" => 1,
                "name" => "Dagon"
            ],
            [
                "division_id" => 1,
                "city_id" => 1,
                "name" => "Hlaing"
            ],
            [
                "division_id" => 2,
                "city_id" => 2,
                "name" => "Bago"
            ],
            [
                "division_id" => 3,
                "city_id" => 3,
                "name" => "Amarapura"
            ],
            [
                "division_id" => 3,
                "city_id" => 3,
                "name" => "Chanmyathazi"
            ],
            [
                "division_id" => 3,
                "city_id" => 3,
                "name" => "Maha Aungmye"
            ],
        ];

        Township::insert($data);
    }
}
