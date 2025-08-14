<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; // nama tabel
    protected $primaryKey = 'usr_id'; // primary key
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'usr_name',
        'usr_email',
        'usr_password',
        'usr_remember_token',
        'usr_token'
    ];

    protected $hidden = [
        'usr_password',
        'usr_remember_token',
        'usr_token',
    ];

    // Ganti kolom password default
    public function getAuthPassword()
    {
        return $this->usr_password;
    }

    // Laravel defaultnya pakai "email", jadi kita override
    public function getAuthIdentifierName()
    {
        return 'usr_email';
    }
}
