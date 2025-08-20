<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->enum('usr_role', ['student','student_affairs'])->default('student')->after('usr_password');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('usr_role');
    });
}

};
