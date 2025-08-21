<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    // Nama tabel (opsional, Laravel otomatis pakai plural -> candidates)
    protected $table = 'candidates';

    // Primary key bukan "id" default
    protected $primaryKey = 'cdt_id';

    // Kalau primary key bukan increment int/uuid bisa set ini:
    public $incrementing = true; 

    // Kalau bukan integer (misal UUID) baru ubah tipe ke string
    protected $keyType = 'int';

    // Field yang bisa diisi mass-assignment
    protected $fillable = [
        'cdt_name',
        'cdt_password',
        'cdt_email',
        'cdt_phone',
        'cdt_desc',
        'cdt_photo'
    ];
}
