<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'user_management_access',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '17',
                'title'      => 'product_management_access',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '18',
                'title'      => 'product_category_create',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '19',
                'title'      => 'product_category_edit',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '20',
                'title'      => 'product_category_show',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '21',
                'title'      => 'product_category_delete',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '22',
                'title'      => 'product_category_access',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '23',
                'title'      => 'product_tag_create',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '24',
                'title'      => 'product_tag_edit',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '25',
                'title'      => 'product_tag_show',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '26',
                'title'      => 'product_tag_delete',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '27',
                'title'      => 'product_tag_access',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '28',
                'title'      => 'product_create',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '29',
                'title'      => 'product_edit',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '30',
                'title'      => 'product_show',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '31',
                'title'      => 'product_delete',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '32',
                'title'      => 'product_access',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '33',
                'title'      => 'faq_management_access',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '34',
                'title'      => 'faq_category_create',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '35',
                'title'      => 'faq_category_edit',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '36',
                'title'      => 'faq_category_show',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '37',
                'title'      => 'faq_category_delete',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '38',
                'title'      => 'faq_category_access',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '39',
                'title'      => 'faq_question_create',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '40',
                'title'      => 'faq_question_edit',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '41',
                'title'      => 'faq_question_show',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '42',
                'title'      => 'faq_question_delete',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
            [
                'id'         => '43',
                'title'      => 'faq_question_access',
                'created_at' => '2019-10-03 09:54:14',
                'updated_at' => '2019-10-03 09:54:14',
            ],
        ];

        Permission::insert($permissions);
    }
}
