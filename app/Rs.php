<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rs extends Model
{
    protected $table = "rs";

    protected $fillable = ['name','address','latitude','longitude'];
}
