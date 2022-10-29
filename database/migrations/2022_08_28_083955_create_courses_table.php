<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->longText('introduction')->nullable();
            $table->longText('about_this_course');
            $table->string('duration');
            $table->datetime('class_start_date');
            $table->string('class_end_date')->nullable();
            $table->string('is_active');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
