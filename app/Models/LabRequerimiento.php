<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Ilumninate\Support\Facades\URL;

class LabRequerimiento extends Models
{
  protected $table = "lab_requerimiento";
  protected $primaryKey = 'id_requerimiento';
  protected $fillable = ['id_requerimiento',
                          'id_area',
                          'descripcion',
                          'tipo_solicitante',
                          'cve_solicito',
                          'fecha_solicito',
                          'fecha_limite',
                          'fecha_realizo'
                        ];
  function area(){                                              //Foreingn_key, local_key
    return $this->hasOne('App\Models\LabArea','id_area','id_area')->first();
  }
  function mantenimientos(){                                              //Foreingn_key, local_key
    return $this->hasMany('App\Models\LabMantenimiento','id_requerimiento','id_requerimiento')->get();
  }
  function requerimientosItems(){                                              //Foreingn_key, local_key
    return $this->hasMany('App\Models\LabRequerimientoItem','id_requerimiento','id_requerimiento')->get();
  }
  function notificacionesBec(){                                              //Foreingn_key, local_key
    return $this->hasMany('App\Models\Notificacion','id_requerimiento','id_requerimiento')->get();
  }


}
?>
