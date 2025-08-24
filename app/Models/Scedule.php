<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scedule extends Model
{
    protected $table = 'scedules';
    protected $primaryKey = 'scd_id';
    public $timestamps = false; // karena kita pakai bigint manual

    protected $fillable = [
        'scd_name',
        'scd_deskripsi',
        'scd_tanggal_mulai',
        'scd_tanggal_selesai',
        'scd_created_at',
        'scd_updated_at',
    ];
}
