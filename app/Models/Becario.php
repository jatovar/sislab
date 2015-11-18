<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Becario extends Model
{
  protected $table = 'becarios';
  protected $primaryKey = 'cve_uaslp';
  protected $fillable = ['cve_uaslp','rpe','activo'];

  function alumno()
  {
    return $this->hasOne('App\Models\Alumno','clave_unica','cve_uaslp')->first();
  }
  function laboratorios()
  {
    return $this->hasMany('App\Models\LaboratorioBec','clave_uaslp','cve_uaslp')->get();
  }
}
?>
