<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_infos', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->unsigned();
            $table->time('time_in');
            $table->time('time_out');
            $table->integer('remaining_working_hours');
            $table->time('total_undertime_hours');
            $table->integer('total_working_hours');
            $table->date('date_of_duty');
            $table->string('tracking_no');
            $table->string('remarks')->nullable();
            $table->string('status')->default('Absent');
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
        Schema::dropIfExists('attendance_infos');
    }
}
