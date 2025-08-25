<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'results';       // nama tabel
    protected $primaryKey = 'rst_id';   // primary key di DB
    public $timestamps = true;          // gunakan created_at

    protected $fillable = [
        'rcd_id',
        'cdt_id',
        'usr_id',
    ];

    /**
     * Relasi ke Candidate
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'cdt_id', 'cdt_id');
    }

    /**
     * Relasi ke User
     */
    public function user()
{
    return $this->belongsTo(User::class, 'usr_id', 'usr_id');
}
}
