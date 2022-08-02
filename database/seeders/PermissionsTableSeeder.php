<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
//            [
//                'id'    => 1,
//                'title' => 'user_management_access',
//            ],
//            [
//                'id'    => 2,
//                'title' => 'permission_create',
//            ],
//            [
//                'id'    => 3,
//                'title' => 'permission_edit',
//            ],
//            [
//                'id'    => 4,
//                'title' => 'permission_show',
//            ],
//            [
//                'id'    => 5,
//                'title' => 'permission_delete',
//            ],
//            [
//                'id'    => 6,
//                'title' => 'permission_access',
//            ],
//            [
//                'id'    => 7,
//                'title' => 'role_create',
//            ],
//            [
//                'id'    => 8,
//                'title' => 'role_edit',
//            ],
//            [
//                'id'    => 9,
//                'title' => 'role_show',
//            ],
//            [
//                'id'    => 10,
//                'title' => 'role_delete',
//            ],
//            [
//                'id'    => 11,
//                'title' => 'role_access',
//            ],
//            [
//                'id'    => 12,
//                'title' => 'user_create',
//            ],
//            [
//                'id'    => 13,
//                'title' => 'user_edit',
//            ],
//            [
//                'id'    => 14,
//                'title' => 'user_show',
//            ],
//            [
//                'id'    => 15,
//                'title' => 'user_delete',
//            ],
//            [
//                'id'    => 16,
//                'title' => 'user_access',
//            ],
//            [
//                'id'    => 17,
//                'title' => 'audit_log_show',
//            ],
//            [
//                'id'    => 18,
//                'title' => 'audit_log_access',
//            ],
//            [
//                'id'    => 19,
//                'title' => 'profile_password_edit',
//            ],
//            [
//                'id'    => 20,
//                'title' => 'setting_edit',
//            ],
//            [
//                'id'    => 21,
//                'title' => 'setting_access',
//            ],


            [
                'id'    => 22,
                'title' => 'position_create',
            ],
            [
                'id'    => 23,
                'title' => 'position_edit',
            ],
            [
                'id'    => 24,
                'title' => 'position_show',
            ],
            [
                'id'    => 25,
                'title' => 'position_delete',
            ],
            [
                'id'    => 26,
                'title' => 'position_access',
            ],
            [
                'id'    => 27,
                'title' => 'menu_create',
            ],
            [
                'id'    => 28,
                'title' => 'menu_edit',
            ],
            [
                'id'    => 29,
                'title' => 'menu_show',
            ],
            [
                'id'    => 30,
                'title' => 'menu_delete',
            ],
            [
                'id'    => 31,
                'title' => 'menu_access',
            ],
            [
                'id'    => 32,
                'title' => 'menu_management_access',
            ],
            [
                'id'    => 33,
                'title' => 'article_management_access',
            ],
            [
                'id'    => 34,
                'title' => 'article_category_create',
            ],
            [
                'id'    => 35,
                'title' => 'article_category_edit',
            ],
            [
                'id'    => 36,
                'title' => 'article_category_show',
            ],
            [
                'id'    => 37,
                'title' => 'article_category_delete',
            ],
            [
                'id'    => 38,
                'title' => 'article_category_access',
            ],
            [
                'id'    => 39,
                'title' => 'article_create',
            ],
            [
                'id'    => 40,
                'title' => 'article_edit',
            ],
            [
                'id'    => 41,
                'title' => 'article_show',
            ],
            [
                'id'    => 42,
                'title' => 'article_delete',
            ],
            [
                'id'    => 43,
                'title' => 'article_access',
            ],

        ];

        Permission::insert($permissions);
    }
}
