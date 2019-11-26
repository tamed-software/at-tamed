<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quota extends Model
{
    protected $table = 'quota';

    protected $fillable = ['id','start_time', 'end_time'];
}
