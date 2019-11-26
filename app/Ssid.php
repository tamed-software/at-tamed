<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ssid extends Model
{
    protected $table = 'ssids';

    protected $fillable = ['ssid', 'ssid_pass', 'fecha', 'address_id', 'provider_id'];

    // Un ssid pertenece a una direccion
    public function addresses() {
        return $this->belongsTo('App\Address');
    }

    // Un ssid pertenece a un proveedor
    public function provider() {
        return $this->belongsTo('App\Provider');
    }

    // Un ssid tiene muchos routers
    public function routers() {
    	return $this->hasMany('App\Router');
    }
}
