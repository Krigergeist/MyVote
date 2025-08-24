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
        Schema::create('scedules', function (Blueprint $table) {
            $table->bigIncrements('scd_id'); 
            $table->string('scd_name', 255);
            $table->text('scd_deskripsi')->nullable();
            $table->dateTime('scd_tanggal_mulai');
            $table->dateTime('scd_tanggal_selesai');
            $table->bigInteger('scd_created_at')->nullable();
            $table->bigInteger('scd_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scedules');
    }
};
