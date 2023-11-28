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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("name", 150);
            $table->string("email", 200);
            $table->string("phonno", 200);
            $table->enum("post", ["ADMIN", "STORE MANAGER", "SALES MANAGER", "PEON", "MARKETING MANAGER"]);
            $table->double("salary");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
