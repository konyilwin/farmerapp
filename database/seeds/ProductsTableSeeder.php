<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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
                "name" => "Fried Chicken",
                "description" => "Fried Chicken",
                "price" => 2000,
                "division_ids" => "1,2,3",
                "city_ids" => "1,2,3",
                "township_ids" => "1,2,5,6",
                "user_id" => 1,
            ],
            [
                "name" => "Coca Cola",
                "description" => "Coca Cola",
                "price" => 550,
                "division_ids" => "1",
                "city_ids" => "1",
                "township_ids" => "1,3",
                "user_id" => 1,
            ],
            [
                "name" => "Piza",
                "description" => "Piza",
                "price" => 4000,
                "division_ids" => "1,3",
                "city_ids" => "1,3",
                "township_ids" => "4,6,7,8",
                "user_id" => 1,
            ],
            [
                "name" => "Pesi",
                "description" => "Pesi",
                "price" => 600,
                "division_ids" => "2,3",
                "city_ids" => "2,3",
                "township_ids" => "2,6,8",
                "user_id" => 1,
            ]
        ];
        Product::insert($data);

        $data = [
            [
                "product_id" => 1,
                "product_category_id" => 2
            ],
            [
                "product_id" => 1,
                "product_category_id" => 3
            ],
            [
                "product_id" => 2,
                "product_category_id" => 1
            ],
            [
                "product_id" => 3,
                "product_category_id" => 2
            ],
            [
                "product_id" => 3,
                "product_category_id" => 3
            ],
            [
                "product_id" => 4,
                "product_category_id" => 1
            ],
            [
                "product_id" => 4,
                "product_category_id" => 3
            ]
        ];
        DB::table("product_product_category")->insert($data);

        $data = [
            [
                "product_id" => 1,
                "product_tag_id" => 2
            ],
            [
                "product_id" => 1,
                "product_tag_id" => 3
            ],
            [
                "product_id" => 2,
                "product_tag_id" => 1
            ],
            [
                "product_id" => 3,
                "product_tag_id" => 2
            ],
            [
                "product_id" => 3,
                "product_tag_id" => 3
            ],
            [
                "product_id" => 4,
                "product_tag_id" => 1
            ],
            [
                "product_id" => 4,
                "product_tag_id" => 3
            ]
        ];
        DB::table("product_product_tag")->insert($data);
    }
}
