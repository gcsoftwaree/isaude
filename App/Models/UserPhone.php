<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPhone extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_GLB_PESSOA_TELEFONE';
    protected $primaryKey = 'COD_PESSOA_TELEFONE';
    protected $fillable = [
        'COD_PESSOA',
        'TP_TELEFONE',
        'ST_TELEFONE_PRINCIPAL',
        'NUM_TELEFONE'
    ];
}
