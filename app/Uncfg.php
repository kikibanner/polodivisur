<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uncfg extends Model
{
    protected $table = 'uncfg';
    protected $fillable = ['ip_olt','hostname_olt','fsp','sn'];
    public $timestamps = false;
}
