<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseContentType;
use App\Models\Lesson;
use App\Models\LessonType;
use App\Models\RequiredSkill;
use App\Models\SkillsCovered;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $courseContentTypes = CourseContentType::where('is_active','1')->get()->pluck('id')->toArray();
        $skillsCovered = SkillsCovered::where('is_active','1')->get()->pluck('id')->toArray();
        $requiredSkill = RequiredSkill::where('is_active','1')->get()->pluck('id')->toArray();
        $course_category_id = $faker->randomElement(CourseCategory::where('is_active','1')->get()->pluck('id')->toArray());
        $title = $faker->paragraph(1);
        $slug = Str::slug($title);
        for ($i = 1; $i < 10; $i++) {
            $course =[
                'course_category_id'=>$course_category_id,
                'title'=>$title,
                'slug'=>$slug,
                'introduction'=>$faker->paragraph(5),
                'about_this_course'=>$faker->paragraph(30),
                'duration'=>'6th Month',
                'class_start_date'=>'2022-11-02',
                'class_end_date'=>'2023-05-02',
                'is_active'=>'1'
            ];

            $course =  Course::create($course);

            $course->course_content_types()->sync($courseContentTypes);
            $course->skill_covereds()->sync($skillsCovered);
            $course->required_skills()->sync($requiredSkill);
            $this->lesson($course,$courseContentTypes);

        }
    }
    public function lesson($course,$courseContentTypes){
        $faker  = Factory::create();
        $no = $faker->randomElement([10,12,15,20,25]);
        $title = $faker->paragraph(1);
        $slug = Str::slug($title);
        for ($i=1; $i < $no; $i++){
            $lesson_type_id = $faker->randomElement(LessonType::where('is_active','1')->get()->pluck('id')->toArray());
            $course_content_type_id = $faker->randomElement($courseContentTypes);
            $lesson =[
                'course_id'=>$course->id,
                'title'=>$title,
                'slug'=>$slug,
                'lesson_type_id'=>$lesson_type_id,
                'course_content_type_id'=>$course_content_type_id,
                'is_active'=>'1'
            ];
            Lesson::create($lesson);
        }

    }
}
