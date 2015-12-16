<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Profesor extends Model
{
  protected $table = 'profesores';
  protected $primaryKey = 'rpe';
  protected $fillable = ['rpe','clave_uaslp','nombre','ap_paterno','ap_materno','activo'];

  function laboratorios()
  {
    return $this->hasMany('App\Models\Laboratorio','rpe_jefe','rpe')->get();
  }
  function nombreCompleto()
  {
    return $this->ap_paterno." ".$this->ap_materno." ".$this->nombre;
  }
}
 ?>
