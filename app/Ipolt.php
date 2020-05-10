<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ipolt extends Model
{
    protected $table = 'ipolt';
    protected $fillable = ['sto','merk','type','hostname','ip_oam','metro','metro_port_1','metro_port_2','vlan_inet','alamat','grup'];
    public $timestamps = false;
}
