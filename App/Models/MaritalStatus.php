<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_GLB_ESTADO_CIVIL';
    protected $primaryKey = 'COD_ESTADO_CIVIL';
    protected $fillable = [
        'NOME_ESTADO_CIVIL'
    ];
}
