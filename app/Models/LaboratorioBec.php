<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class LaboratorioBec extends Model
{
  protected $table = 'laboratorios_bec';
  #protected $primaryKey = 'id_laboratorios';
  protected $fillable = ['id_laboratorios','clave_uaslp','id_semestre'];
  function becario()
  {
      return $this->hasOne('App\Models\Becario','cve_uaslp','cve_uaslp')->first();
  }
  function laboratorio()
  {
      return $this->hasOne('App\Models\Laboratorio','id_laboratorio','id_laboratorios')->first();
  }
  function semestre()
  {
    return $this->hasOne('App\Models\Semestre','id_semestre','id_semestre')->first();
  }
  

}
 ?>
