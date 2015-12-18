<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 *
 */
class LabMantenimiento extends Model
{

  protected $table = 'lab_mantenimiento';
   public $timestamps = false;
  protected $primaryKey = 'id_mantenimiento';
  protected $fillable = ['id_mantenimiento',
                          'id_area',
                          'id_requerimiento',
                          'id_tipo',
                          'actividad',
                          'descripcion',
                          'tipo_responsable',
                          'cve_responsable',
                          'fecha_realizo'
                        ];
  function labArea(){                                              //Foreingn_key, local_key
        return $this->hasOne('App\Models\LabArea','id_area','id_area')->first();
  }
  function requerimiento()
  {
      return $this->hasOne('App\Models\LabRequerimiento','id_requerimiento','id_requerimiento')->first();
  }
  function items()
  {
    return $this->hasMany('App\Models\LabMantenimientoItem','id_lab_mantenimiento','id_mantenimiento')->get();
  }
  function nombreResponsable()
  {
    $bec = Becario::where('cve_uaslp',$this->cve_responsable)->first();
    if($bec)
    {
      return $bec->alumno()->nombreCompleto();
    }
    $prof = Profesor::where('rpe',$this->cve_responsable)->first();
    if($prof)
    {
      return $prof->nombreCompleto();
    }
    return "";
  }
}
?>
