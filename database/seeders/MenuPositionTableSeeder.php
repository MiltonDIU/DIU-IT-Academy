<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuPositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position = [
            [
                'id'    => 1,
                'is_active'    => 1,
                'title' => 'Main Menu',

            ],
            [
                'id'    => 2,
                'is_active'    => 2,
                'title' => 'Footer Menu',
            ],
        ];

        Position::insert($position);
    }
}
