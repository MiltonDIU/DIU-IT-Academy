<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLessonsTable extends Migration
{
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_7219398')->references('id')->on('courses');
            $table->unsignedBigInteger('lesson_type_id')->nullable();
            $table->foreign('lesson_type_id', 'lesson_type_fk_7219399')->references('id')->on('lesson_types');
        });
    }
}
