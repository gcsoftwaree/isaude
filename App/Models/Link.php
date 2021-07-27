<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_GLB_LINK_TMP';
    protected $primaryKey = 'COD_LINK_TMP';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'COD_PESSOA',
        'TP_LINK_TMP',
        'DS_TOKEN',
        'DT_CADASTRO',
        'DT_ACESSO'
    ];

}
