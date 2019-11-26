<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $table = 'comunas';

    protected $fillable = ['nombre', 'ciudad_id'];

    // Una comuna pertenece a una ciudad
    public function provincia() {
    	return $this->belongsTo('App\Ciudad');
    }
}
