<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'TB_USR_PERFIL';
    protected $primaryKey = 'COD_PERFIL';
    protected $fillable = [
        'NOME_PERFIL',
        'DS_PERFIL',
        'ST_PERFIL'
    ];

    const ADMIN     = 1;
    const USER      = 2;
    const PARTNER   = 3;

}
