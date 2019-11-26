<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestas extends Model
{
  protected $table = 'encuestas';

  protected $fillable = ['cliente_id', 'calificacion'];
}
