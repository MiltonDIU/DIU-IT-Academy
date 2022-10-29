<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseContentTypesTable extends Migration
{
    public function up()
    {
        Schema::create('course_content_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('is_active');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
