<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCourseContentTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('course_course_content_type', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_id_fk_7219369')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('course_content_type_id');
            $table->foreign('course_content_type_id', 'course_content_type_id_fk_7219369')->references('id')->on('course_content_types')->onDelete('cascade');
        });
    }
}
