<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'records';

    // Primary key
    protected $primaryKey = 'rcd_id';

    // Primary key auto increment integer
    public $incrementing = true;
    protected $keyType = 'int';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'rcd_name',
        'rcd_desc',
        'start_at',
        'end_at',
    ];

    /**
     * Relasi ke kandidat
     * 1 record punya banyak kandidat
     */
    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'rcd_id', 'rcd_id');
    }

    /**
     * Relasi ke hasil voting
     * 1 record punya banyak hasil vote
     */
    public function results()
    {
        return $this->hasMany(Result::class, 'rcd_id', 'rcd_id');
    }
}
