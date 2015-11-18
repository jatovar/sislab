<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 *
 */
class Area extends Model
{
  protected $table = 'areas';
  protected $primaryKey = 'id_area';
  protected $fillable = ['id_area','area'];

  function carreras()
  {
    return $this->hasMany('App\Models\Carrera','id_area','id_area')->get();
  }

}
