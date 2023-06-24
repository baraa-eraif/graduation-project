<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('number_of_hour');
            $table->unsignedInteger('study_plan_id');
            $table->enum('year',array(1,2));
            $table->enum('ordered',array(1,2,3))->comment('study_season');
            $table->timestamp('end_date');
            $table->timestamp('start_date');
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
        Schema::dropIfExists('semesters');
    }
}
