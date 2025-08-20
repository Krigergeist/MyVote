<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; // tetap gunakan tabel users
    protected $primaryKey = 'usr_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'usr_name',
        'usr_email',
        'usr_password',
        'usr_role',
        'usr_remember_token',
        'usr_token'
    ];

    protected $hidden = [
        'usr_password',
        'usr_remember_token',
        'usr_token',
    ];

    public function getAuthPassword()
    {
        return $this->usr_password;
    }

    public function getAuthIdentifierName()
    {
        return 'usr_email';
    }
}
