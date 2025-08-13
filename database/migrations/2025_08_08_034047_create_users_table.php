<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->bigInteger('usr_id')->length(11)->primary();
        $table->string('usr_name');
        $table->string('usr_email')->unique();
        $table->string('usr_password');
        $table->string('usr_remember_token');
        $table->string('usr_token')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
