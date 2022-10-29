<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSkillsCoveredPivotTable extends Migration
{
    public function up()
    {
        Schema::create('course_skills_covered', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_id_fk_7219370')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('skills_covered_id');
            $table->foreign('skills_covered_id', 'skills_covered_id_fk_7219370')->references('id')->on('skills_covereds')->onDelete('cascade');
        });
    }
}
