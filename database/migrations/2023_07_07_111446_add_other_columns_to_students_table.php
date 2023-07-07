<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherColumnsToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('father_name');
            $table->string('grandfather_name');
            $table->string('family_name');
            $table->timestamp('date_of_birth');
            $table->integer('phone');
            $table->double('high_school_gpa');
            $table->string('address');
            $table->enum('gender',array('male','female'));
            $table->integer('national_id');
            $table->string('nationality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}
