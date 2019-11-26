<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hc extends Model
{
    protected $table = 'hcs';

    protected $fillable = ['tipo', 'ddns', 'puerto', 'imagen', 'login_user_int', 'login_pass_int', 'login_user_ext', 'login_pass_ext', 'fecha', 'router_id'];

    // Un hc pertenece a un router
    public function router() {
        return $this->belongsTo('App\Router');
    }
}
