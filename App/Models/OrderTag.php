<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTag extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_SIS_PEDIDO_TAG';
    protected $primaryKey = 'COD_PEDIDO_TAG';
    protected $fillable =[
    'COD_PEDIDO',
    'DS_PEDIDO_TAG'
    ];
}
