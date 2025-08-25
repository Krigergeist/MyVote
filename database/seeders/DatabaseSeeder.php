<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // USERS
        DB::table('users')->insert([
            ['usr_id' => 1, 'usr_name' => 'Admin Utama', 'usr_email' => 'admin@example.com', 'usr_password' => Hash::make('password'), 'usr_role' => 'student_affairs'],
            ['usr_id' => 2, 'usr_name' => 'Petugas 1', 'usr_email' => 'petugas@example.com', 'usr_password' => Hash::make('password'), 'usr_role' => 'student_affairs'],
            ['usr_id' => 3, 'usr_name' => 'uno', 'usr_email' => 'uno@gmail.com', 'usr_password' => Hash::make('11111111'), 'usr_role' => 'student_affairs'],
            ['usr_id' => 4, 'usr_name' => 'Asnan', 'usr_email' => 'asnan@gmail.com', 'usr_password' => Hash::make('11111111'), 'usr_role' => 'student'],
        ]);

        // CANDIDATE
        DB::table('candidates')->insert([
            ['cdt_id' => 1, 'cdt_name' => 'Calon Ketua 1','cdt_email' => 'calon1@example.com','cdt_phone' => '08123456789', 'cdt_password' => Hash::make('123456')],
            ['cdt_id' => 2, 'cdt_name' => 'Calon Ketua 2', 'cdt_email' => 'calon2@example.com', 'cdt_phone' => '08123456789', 'cdt_password' => Hash::make('123456')],
        ]);

        DB::table('scedules')->insert([
            ['scd_id' => 1, 'scd_name' => 'pemilihan ketua OSIS', 'scd_tanggal_mulai' => $now, 'scd_tanggal_selesai' => $now->copy()->addDays(2)],
        ]);

        // RECORD (dummy voting session)
        DB::table('records')->insert([
            ['rcd_id' => 1, 'rcd_name' => 'Pemilihan ketua OSIS'],
        ]);

        // RESULTS (dummy votes)
        DB::table('results')->insert([
            ['rst_id' => 1, 'rcd_id' => 1, 'cdt_id' => 1, 'usr_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['rst_id' => 2, 'rcd_id' => 1, 'cdt_id' => 2, 'usr_id' => 3, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
