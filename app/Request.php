<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'request';

    public function getCreatedAtAttribute($created_at){
        return new Date($created_at);
    }

    public function getUpdatedAtAttribute($updated_at){
        return new Date($updated_at);
    }
}
