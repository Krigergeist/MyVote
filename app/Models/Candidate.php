<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan.
     * Laravel default-nya sudah "candidates", jadi ini opsional.
     */
    protected $table = 'candidates';

    /**
     * Nama primary key.
     */
    protected $primaryKey = 'cdt_id';

    /**
     * Primary key berupa auto-increment integer.
     */
    public $incrementing = true;

    /**
     * Tipe data primary key.
     */
    protected $keyType = 'int';

    /**
     * Field yang boleh diisi secara mass-assignment.
     */
    protected $fillable = [
        'rcd_id',       // ID dari record pemilihan
        'cdt_name',     // Nama kandidat
        'cdt_password', // Jika memang kandidat login sendiri (opsional)
        'cdt_email',
        'cdt_phone',
        'cdt_desc',     // Deskripsi/visi/misi
        'cdt_photo'     // Path foto kandidat
    ];

    /**
     * Relasi: satu kandidat punya banyak hasil (votes) di tabel results.
     */
    public function results()
    {
        return $this->hasMany(Result::class, 'cdt_id', 'cdt_id');
    }

    /**
     * (Opsional) Relasi ke record (jika tabel records adalah pemilihan)
     */
    public function record()
    {
        return $this->belongsTo(Record::class, 'rcd_id', 'rcd_id');
    }
}
