<?php

namespace Database\Seeders;

use App\Models\CourseContentType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
//            PermissionsTableSeeder::class,
//            RolesTableSeeder::class,
//            PermissionRoleTableSeeder::class,
//            UsersTableSeeder::class,
//            RoleUserTableSeeder::class,
//            SettingTableSeeder::class,
//        CourseCategoryTableSeeder::class,
//            CourseContentTypeTableSeeder::class,
//            LessonTypeTableSeeder::class,
//            RequiredSKillTableSeeder::class
        SkillsCoveredTableSeeder::class,
        ]);
    }
}
