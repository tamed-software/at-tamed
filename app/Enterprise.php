<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $table = 'enterprises';

    protected $fillable = ['enterprise'];

    // Una empresa tiene muchos usuarios instaladores
    public function users() {
    	return $this->hasMany('App\User');
    }
}
