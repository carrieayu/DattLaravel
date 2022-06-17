<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymeeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employmee_infos', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->unsigned();
            $table->BigInteger('position_id')->unsigned();
            $table->BigInteger('department_id')->unsigned();
            $table->BigInteger('role_id')->unsigned();
            $table->date('date_of_regular');
            $table->string('department');
            $table->string('employment_status');
            $table->string('position');
            $table->string('phone_name');
            $table->string('work_email');
            $table->integer('basic_salary');
            $table->integer('allowance');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('employmee_infos');
    }
}
