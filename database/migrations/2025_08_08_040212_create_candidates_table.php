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
            $table->bigIncrements('cdt_id'); 
            $table->string('cdt_name');
            $table->string('cdt_password');
            $table->string('cdt_email')->unique();
            $table->string('cdt_phone');
            $table->text('cdt_desc')->nullable();
            $table->string('cdt_photo')->nullable();
            $table->timestamps();
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
