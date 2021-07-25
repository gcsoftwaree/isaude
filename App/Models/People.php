<?php

namespace App\Models;

use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_GLB_PESSOA';
    protected $primaryKey = 'COD_PESSOA';
    protected $fillable = [
   'TP_PESSOA',
   'COD_TIPO_GENERO',
   'cod_estado_civil',
   'cod_nivel_escolaridade',
   'CPF_CNPJ',
   'NOME_PESSOA',
   'nome_razao_social',
   'nome_fantasia',
   'nome_mae',
   'nome_pai',
   'DT_NASCIMENTO',
   'DT_CADASTRO'
    ];

}
