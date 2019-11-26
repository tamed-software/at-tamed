<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usersinmobiliaria extends Authenticatable
{
	use Notifiable;

    protected $guard = 'userinmobiliarios';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */

	protected $table = 'usersinmobiliarias';

    protected $fillable = [
        'name', 'lastname','email', 'password', 'inmobiliaria_id',
    ];

    // Un usuario de inmobiliaria pertenece a una inmobiliaria
    public function inmobiliaria() {
        return $this->belongsTo('App\Inmobiliaria');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	/*
	protected $table = 'usersinmobiliarias';

	protected $fillable = ['name', 'lastname', 'email', 'password', 'inmobiliaria_id'];

	protected $hidden = [
        'password', 'remember_token',
    ];

    // Un usuario de inmobiliaria pertenece a una inmobiliaria
    public function inmobiliaria() {
        return $this->belongsTo('App\Inmobiliaria');
    }
    */
}
