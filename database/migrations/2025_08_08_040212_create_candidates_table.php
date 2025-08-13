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
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('cdt_id'); // BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT
            $table->string('cdt_name', 255);
            $table->string('cdt_password', 255);
            $table->timestamps(); // optional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
