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
            [
                'usr_id' => 1,
                'usr_name' => 'Admin Utama',
                'usr_email' => 'admin@example.com',
                'usr_email_verified_at' => $now,
                'usr_password' => Hash::make('password'),
                'usr_status' => 1,
                'usr_created_at' => $now,
                'usr_sys_note' => '1(baik)',
            ],
            [
                'usr_id' => 2,
                'usr_name' => 'Petugas 1',
                'usr_email' => 'petugas@example.com',
                'usr_password' => Hash::make('password'),
                'usr_status' => 1,
                'usr_created_by' => 1,
                'usr_created_at' => $now,
            ],
        ]);

        // TEACHER
        DB::table('teacher')->insert([
            [
                'tcr_id' => 1,
                'tcr_name' => 'Guru A',
                'tcr_password' => Hash::make('123456'),
                'tcr_created_at' => $now,
            ],
            [
                'tcr_id' => 2,
                'tcr_name' => 'Guru B',
                'tcr_password' => Hash::make('123456'),
                'tcr_created_at' => $now,
            ],
        ]);

        // STUDENT
        DB::table('student')->insert([
            [
                'std_id' => 1,
                'std_name' => 'Siswa 1',
                'std_password' => Hash::make('123456'),
                'std_created_at' => $now,
            ],
            [
                'std_id' => 2,
                'std_name' => 'Siswa 2',
                'std_password' => Hash::make('123456'),
                'std_created_at' => $now,
            ],
        ]);

        // CANDIDATE
        DB::table('candidate')->insert([
            [
                'cdt_id' => 1,
                'cdt_name' => 'Calon Ketua 1',
                'cdt_password' => Hash::make('123456'),
                'cdt_created_at' => $now,
            ],
            [
                'cdt_id' => 2,
                'cdt_name' => 'Calon Ketua 2',
                'cdt_password' => Hash::make('123456'),
                'cdt_created_at' => $now,
            ],
        ]);

        // RECORD
        DB::table('record')->insert([
            [
                'rcd_id' => 1,
                'rcd_name' => 'Pemilihan OSIS',
                'rcd_created_by' => 1,
                'rcd_created_at' => $now,
            ],
            [
                'rcd_id' => 2,
                'rcd_name' => 'Pemilihan Ketua Kelas',
                'rcd_created_by' => 2,
                'rcd_created_at' => $now,
            ],
        ]);

        // RESULTS
        DB::table('results')->insert([
            [
                'rst_id' => 1,
                'rst_siswa_id' => 1,
                'rst_nama' => 1,
                'rst_created_by' => 1,
                'rst_created_at' => $now,
            ],
            [
                'rst_id' => 2,
                'rst_siswa_id' => 2,
                'rst_nama' => 2,
                'rst_created_by' => 2,
                'rst_created_at' => $now,
            ],
        ]);

        // SCHEDULES
        DB::table('schedules')->insert([
            [
                'scd_id' => 1,
                'scd_name' => 'Jadwal Pemilihan OSIS',
                'scd_deskripsi' => 'Pemilihan ketua OSIS tahun ajaran baru',
                'scd_tanggal_mulai' => $now,
                'scd_tanggal_selesai' => $now->copy()->addDays(3),
                'scd_created_at' => time(),
                'scd_updated_at' => time(),
            ],
            [
                'scd_id' => 2,
                'scd_name' => 'Jadwal Pemilihan Ketua Kelas',
                'scd_deskripsi' => 'Pemilihan ketua kelas semester ini',
                'scd_tanggal_mulai' => $now,
                'scd_tanggal_selesai' => $now->copy()->addDays(2),
                'scd_created_at' => time(),
                'scd_updated_at' => time(),
            ],
        ]);
    }
}
