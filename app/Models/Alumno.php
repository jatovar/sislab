<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Alumno extends Model
{
  protected $table = 'alumnos';
  protected $primaryKey = 'clave_unica';
  protected $fillable = ['clave_unica','id_carrera','clave_asesor','clave_ing','nombre',
  'ap_paterno','ap_materno','id_usuario','activo','email'];
  function nombreCompleto ()
  {
    return $this->ap_paterno." ".$this->ap_materno." ".$this->nombre;
  }
  function carrera()
  {
    return $this->hasOne('App\Models\Carrera','id_carrera','id_carrera')->first();
  }
  function becarios()
  {
    return $this->hasMany('App\Models\Becario','cve_uaslp','clave_unica')->get();
  }
  function multas()
  {
    return $this->hasMany('App\Models\LabMultaLaboratorio','cve_alumno','clave_unica')->get();
  }
  function entradas()
  {
    return $this->hasMany('App\Models\LabEntrada','cve_alumno','clave_unica')->get();
  }


}
 ?>
