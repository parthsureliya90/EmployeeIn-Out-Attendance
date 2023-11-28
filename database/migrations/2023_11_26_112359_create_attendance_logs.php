<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->date("attendance_date");
            $table->time("entry_time");
            $table->time("exit_time")->nullable();
            $table->integer("total_woking_hours")->nullable();
            $table->integer("bounus_woking_hours")->default(0)->comment('if wokring hours is more than 8');
            $table->double("hourly_pay", 8, 2)->default(0);
            $table->double("bonus_pay", 8, 2)->default(0);
            $table->double("dailyPay", 8, 2)->default(0);
            $table->foreign('emp_id')->references('id')->on('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_logs');
    }
};
