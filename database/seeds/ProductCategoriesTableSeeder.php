<?php

use App\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
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
                "name" => "drink",
                "description" => "drink"
            ],
            [
                "name" => "lunch",
                "description" => "lunch"
            ],
            [
                "name" => "snack",
                "description" => "snack"
            ],
        ];

        ProductCategory::insert($data);
    }
}
