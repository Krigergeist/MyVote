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
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('rst_id'); // BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT
            $table->string('rst_name', 255);
            $table->string('rst_password', 255);
            $table->timestamps(); // optional, untuk created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
