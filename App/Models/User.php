<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_USR_USUARIO';
    protected $primaryKey = 'COD_USUARIO';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'COD_PESSOA',
        'DS_LOGIN',
        'DS_SENHA',
        'ST_USUARIO',
        'DT_ULITMO_LOGIN'
    ];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->DS_SENHA;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'DS_SENHA'
    ];


}
