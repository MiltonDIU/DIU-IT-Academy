<?php

namespace Database\Seeders;

use App\Models\RequiredSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequiredSkillTableSeeder extends Seeder
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
                'title' => 'PHP',
            ],
            [
                'title' => 'Java ',
            ],
            [
                'title' => 'Python',
            ],
            [
                'title' => '.Net',
            ],
            [
                'title' => 'SQL',
            ],
        ];
        foreach ($skills as $skill){
            $skill['slug'] = \Str::slug($skill['title']) ;
            $skill['is_active'] = 1 ;
            RequiredSkill::insert($skill);
        }
    }
}
