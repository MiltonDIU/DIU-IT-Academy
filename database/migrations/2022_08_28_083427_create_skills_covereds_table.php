<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsCoveredsTable extends Migration
{
    public function up()
    {
        Schema::create('skills_covereds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('is_active');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
