<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TB_GLB_PESSOA_EMAIL';
    protected $primaryKey = 'COD_PESSOA_EMAIL';
    protected $fillable = [
        'COD_PESSOA',
        'ST_EMAIL_PRINCIPAL',
        'DS_EMAIL'];
}
