<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_SIS_PEDIDO';
    protected $primaryKey = 'COD_PEDIDO';
    protected $fillable = [
        'COD_PESSOA',
        'DS_PEDIDO',
        'DT_PEDIDO',
        'ST_PEDIDO'
    ];
}
