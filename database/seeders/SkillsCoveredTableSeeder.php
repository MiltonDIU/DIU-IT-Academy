<?php

namespace Database\Seeders;

use App\Models\SkillsCovered;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsCoveredTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            [
                'title' => 'Learn how to attract investors to your venture.',
            ],
            [
                'title' => 'Assess your venture step by step with practical tools and improve your business with hands on guidance.',
            ],
            [
                'title' => 'Become an investment-ready entrepreneur.',
            ],
            [
                'title' => 'Understanding investor’s mindset.',
            ],
        ];
        foreach ($skills as $skill){
            $skill['slug'] = \Str::slug($skill['title']) ;
            $skill['is_active'] = 1 ;
            SkillsCovered::insert($skill);
        }
    }
}
