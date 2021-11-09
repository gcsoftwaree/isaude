<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelEscolaridade extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_GLB_NIVEL_ESCOLARIDADE';
    protected $primaryKey = 'COD_NIVEL_ESCOLARIDADE';

}
