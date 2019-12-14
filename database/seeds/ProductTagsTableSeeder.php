<?php

use App\ProductTag;
use Illuminate\Database\Seeder;

class ProductTagsTableSeeder extends Seeder
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
                "name" => "50% Off"
            ],
            [
                "name" => "buy One, get One"
            ],
            [
                "name" => "Top Sale"
            ]
        ];
        ProductTag::insert($data);
    }
}
