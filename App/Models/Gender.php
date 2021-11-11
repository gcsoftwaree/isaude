<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_GLB_TIPO_GENERO';
    protected $primaryKey = 'COD_TIPO_GENERO';
    protected $fillable = [
        'NOME_TIPO_GENERO',
        'DS_TIPO_GENERO'
    ];
}
