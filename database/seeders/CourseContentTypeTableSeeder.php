<?php

namespace Database\Seeders;

use App\Models\CourseContentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseContentTypeTableSeeder extends Seeder
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
                'title' => 'Lessons',
            ],
            [
                'title' => 'Resources ',
            ],
            [
                'title' => 'Final Exam',
            ],
            [
                'title' => 'Python Essentials 1 (PE1)',
            ],
            [
                'title' => 'Python Essentials 2 (PE2) ',
            ],
        ];
        foreach ($categories as $category){
            $category['slug'] = \Str::slug($category['title']) ;
            $category['is_active'] = 1 ;
            CourseContentType::insert($category);
        }
    }
}
