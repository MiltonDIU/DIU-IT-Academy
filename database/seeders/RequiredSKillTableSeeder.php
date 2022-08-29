<?php

namespace Database\Seeders;

use App\Models\RequiredSKill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequiredSKillTableSeeder extends Seeder
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
            RequiredSKill::insert($skill);
        }
    }
}
