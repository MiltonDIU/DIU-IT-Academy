<?php

namespace Database\Seeders;

use App\Models\LessonType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessonTypes = [
            [
                'title' => 'Lesson',
            ],
            [
                'title' => 'Quiz ',
            ],
            [
                'title' => 'Final Exam',
            ],
            [
                'title' => 'Resource',
            ],
        ];
        foreach ($lessonTypes as $lessonType){
            $lessonType['slug'] = \Str::slug($lessonType['title']) ;
            $lessonType['is_active'] = 1 ;
            LessonType::insert($lessonType);
        }
    }
}
