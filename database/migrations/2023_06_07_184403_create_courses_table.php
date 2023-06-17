<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_ident');
            $table->string('name');
            $table->unsignedInteger('hour_number');
            $table->json('other_details')->nullable();
            $table->enum('course_type',array('university_requirement','specialty',));
            $table->enum('study_year',array(1,2,3,4));
            $table->enum('study_season',array(1,2));
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
