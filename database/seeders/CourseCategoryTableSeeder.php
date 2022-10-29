<?php

namespace Database\Seeders;

use App\Models\CourseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Accelerate Entrepreneurship',
            ],
            [
                'title' => 'Career Launchpad',
            ],
            [
                'title' => 'Future Skills',
            ],
        ];
            foreach ($categories as $category){
                $category['slug'] = \Str::slug($category['title']) ;
                $category['is_active'] = 1 ;
                CourseCategory::insert($category);
            }
    }
}
