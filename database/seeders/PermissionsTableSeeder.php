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
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 20,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 21,
                'title' => 'setting_access',
            ],


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

            [
                'id'    => 44,
                'title' => 'slider_create',
            ],
            [
                'id'    => 45,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 46,
                'title' => 'slider_show',
            ],
            [
                'id'    => 47,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 48,
                'title' => 'slider_access',
            ],
            [
                'id'    => 49,
                'title' => 'partner_create',
            ],
            [
                'id'    => 50,
                'title' => 'partner_edit',
            ],
            [
                'id'    => 51,
                'title' => 'partner_show',
            ],
            [
                'id'    => 52,
                'title' => 'partner_delete',
            ],
            [
                'id'    => 53,
                'title' => 'partner_access',
            ],
            [
                'id'    => 54,
                'title' => 'social_create',
            ],
            [
                'id'    => 55,
                'title' => 'social_edit',
            ],
            [
                'id'    => 56,
                'title' => 'social_show',
            ],
            [
                'id'    => 57,
                'title' => 'social_delete',
            ],
            [
                'id'    => 58,
                'title' => 'social_access',
            ],
            [
                'id'    => 59,
                'title' => 'testimonial_create',
            ],
            [
                'id'    => 60,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 61,
                'title' => 'testimonial_show',
            ],
            [
                'id'    => 62,
                'title' => 'testimonial_delete',
            ],
            [
                'id'    => 63,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 64,
                'title' => 'contact_create',
            ],
            [
                'id'    => 65,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 66,
                'title' => 'contact_show',
            ],
            [
                'id'    => 67,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 68,
                'title' => 'contact_access',
            ],
            [
                'id'    => 69,
                'title' => 'team_create',
            ],
            [
                'id'    => 70,
                'title' => 'team_edit',
            ],
            [
                'id'    => 71,
                'title' => 'team_show',
            ],
            [
                'id'    => 72,
                'title' => 'team_delete',
            ],
            [
                'id'    => 73,
                'title' => 'team_access',
            ],
            [
                'id'    => 74,
                'title' => 'course_category_create',
            ],
            [
                'id'    => 75,
                'title' => 'course_category_edit',
            ],
            [
                'id'    => 76,
                'title' => 'course_category_show',
            ],
            [
                'id'    => 77,
                'title' => 'course_category_delete',
            ],
            [
                'id'    => 78,
                'title' => 'course_category_access',
            ],
            [
                'id'    => 79,
                'title' => 'courses_seeting_create',
            ],
            [
                'id'    => 80,
                'title' => 'courses_seeting_edit',
            ],
            [
                'id'    => 81,
                'title' => 'courses_seeting_show',
            ],
            [
                'id'    => 82,
                'title' => 'courses_seeting_delete',
            ],
            [
                'id'    => 83,
                'title' => 'courses_seeting_access',
            ],
            [
                'id'    => 84,
                'title' => 'skills_covered_create',
            ],
            [
                'id'    => 85,
                'title' => 'skills_covered_edit',
            ],
            [
                'id'    => 86,
                'title' => 'skills_covered_show',
            ],
            [
                'id'    => 87,
                'title' => 'skills_covered_delete',
            ],
            [
                'id'    => 88,
                'title' => 'skills_covered_access',
            ],
            [
                'id'    => 89,
                'title' => 'required_skill_create',
            ],
            [
                'id'    => 90,
                'title' => 'required_skill_edit',
            ],
            [
                'id'    => 91,
                'title' => 'required_skill_show',
            ],
            [
                'id'    => 92,
                'title' => 'required_skill_delete',
            ],
            [
                'id'    => 93,
                'title' => 'required_skill_access',
            ],
            [
                'id'    => 94,
                'title' => 'lesson_type_create',
            ],
            [
                'id'    => 95,
                'title' => 'lesson_type_edit',
            ],
            [
                'id'    => 96,
                'title' => 'lesson_type_show',
            ],
            [
                'id'    => 97,
                'title' => 'lesson_type_delete',
            ],
            [
                'id'    => 98,
                'title' => 'lesson_type_access',
            ],
            [
                'id'    => 99,
                'title' => 'course_content_type_create',
            ],
            [
                'id'    => 100,
                'title' => 'course_content_type_edit',
            ],
            [
                'id'    => 101,
                'title' => 'course_content_type_show',
            ],
            [
                'id'    => 102,
                'title' => 'course_content_type_delete',
            ],
            [
                'id'    => 103,
                'title' => 'course_content_type_access',
            ],
            [
                'id'    => 104,
                'title' => 'course_create',
            ],
            [
                'id'    => 105,
                'title' => 'course_edit',
            ],
            [
                'id'    => 106,
                'title' => 'course_show',
            ],
            [
                'id'    => 107,
                'title' => 'course_delete',
            ],
            [
                'id'    => 108,
                'title' => 'course_access',
            ],
            [
                'id'    => 109,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 110,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 111,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 112,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 113,
                'title' => 'lesson_access',
            ],

            [
                'id'    => 114,
                'title' => 'required-skills_create',
            ],
            [
                'id'    => 115,
                'title' => 'required-skills_edit',
            ],
            [
                'id'    => 116,
                'title' => 'required-skills_show',
            ],
            [
                'id'    => 117,
                'title' => 'required-skills_delete',
            ],
            [
                'id'    => 118,
                'title' => 'required-skills_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
