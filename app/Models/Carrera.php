<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Carrera extends Model
{
  protected $table = 'carreras';
  protected $primaryKey = 'id_carrera';
  protected $fillable = ['id_carrera','nombre_carrera','id_area'];


  function area()
  {
    return $this->hasOne('App\Models\Area','id_area','id_area')->first();
  }
  function alumnos()
  {
    return $this->hasMany('App\Models\Alumno','id_carrera','id_carrera')->get();
  }
}
?>
