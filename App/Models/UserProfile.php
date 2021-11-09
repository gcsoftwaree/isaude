<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_USR_USUARIO_PERFIL';
    protected $primaryKey = 'COD_USUARIO_PERFIL';
    protected $fillable = [
        'COD_PERFIL',
        'COD_USUARIO',
        'ST_USUARIO_PERFIL'
    ];


}
