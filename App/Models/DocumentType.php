<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_GLB_TIPO_DOCUMENTO';
    protected $primaryKey = 'COD_TIPO_DOCUMENTO';
    protected $fillable =  [
        'NOME_TIPO_DOCUMENTO'
    ];
}
