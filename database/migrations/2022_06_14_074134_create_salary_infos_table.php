<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_infos', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->unsigned();
            $table->BigInteger('bank_id')->unsigned();
            $table->string('salary_description');
            $table->string('salary_type');
            $table->double('basic_pay',8,2)->default(0.00);
            $table->double('allowance',8,2)->default(0.00);
            $table->double('salary_amount', 8, 2)->default(0.00);
            $table->date('fromDate');
            $table->date('toDate');
            $table->integer('total_no_leaves');
            $table->double('total_leave_deduction', 8,2)->default(0.00);
            $table->integer('total_no_days');
            $table->string('status');
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
        Schema::dropIfExists('salary_infos');
    }
}
