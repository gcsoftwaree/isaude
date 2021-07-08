<?php

namespace App\Models;

use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tb_glb_pessoa';
    protected $primaryKey = 'COD_PESSOA';
    protected $fillable = [
   'TP_PESSOA',
   'COD_TIPO_GENERO',
   'COD_ESTADO_CIVIL',
   'COD_NIVEL_ESCOLARIDADE',
   'CPF_CNPJ',
   'NOME_PESSOA',
   'NOME_RAZAO_SOCIAL',
   'NOME_FANTASIA',
   'NOME_MAE',
   'NOME_PAI',
   'DT_NASCIMENTO',
   'DT_CADASTRO'
    ];

}
