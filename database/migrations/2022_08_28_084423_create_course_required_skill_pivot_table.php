<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseRequiredSKillPivotTable extends Migration
{
    public function up()
    {
        Schema::create('course_required_skill', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_id_fk_7219371')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('required_skill_id');
            $table->foreign('required_skill_id', 'required_skill_id_fk_7219371')->references('id')->on('required_skills')->onDelete('cascade');
        });
    }
}
