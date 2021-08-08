<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_GLB_DOCUMENTO';
    protected $primaryKey = 'COD_DOCUMENTO';
    protected $fillable =  [
        'COD_TIPO_DOCUMENTO',
        'NOME_DOCUMENTO',
        'DS_DOCUMENTO',
        'DS_CAMINHO_DOCUMENTO',
        'DT_CADASTRO',
        'NOME_EXTENSAO',
        'DS_MIME_TYPE'
    ];
}
