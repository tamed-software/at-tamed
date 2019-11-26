<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';

    protected $fillable = ['nombre', 'region_id'];

    // Una ciudad pertenece a una región
    public function region() {
    	return $this->belongsTo('App\Region');
    }

    // Una ciudad tiene muchas comunas
    public function comunas() {
    	return $this->hasMany('App\Comuna');
    }
}
