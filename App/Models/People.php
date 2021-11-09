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

    public function mail()
    {
        return $this->hasOne(UserMail::class, 'COD_PESSOA', 'COD_PESSOA');
    }
//    public function setCpfCnpjAttribute($value)
//    {
//        return ucfirst($value);
//    }
}
