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
            $table->bigIncrements('rst_id');
            $table->unsignedBigInteger('rcd_id');   // Record/event voting
            $table->unsignedBigInteger('cdt_id');   // Kandidat
            $table->unsignedBigInteger('usr_id');   // User/siswa yang memilih
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('rcd_id')->references('rcd_id')->on('records')->onDelete('cascade');
            $table->foreign('cdt_id')->references('cdt_id')->on('candidates')->onDelete('cascade');
            $table->foreign('usr_id')->references('usr_id')->on('users')->onDelete('cascade');

            $table->unique(['rcd_id','usr_id']); // mencegah siswa vote lebih dari sekali di satu record
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
