<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentBalanceTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_balance_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('student_id');
            $table->json('student_data');
            $table->double('amount', 20, 10)->default(0);
            $table->string('transaction_type');
            $table->string('description')->nullable();
            $table->unsignedInteger('sourceable_id')->nullable();
            $table->string('sourceable_model')->nullable();
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
        Schema::dropIfExists('student_balance_transactions');
    }
}
