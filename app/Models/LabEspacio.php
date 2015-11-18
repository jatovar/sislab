<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Ilumninate\Support\Facades\URL;

class LabEspacio extends Models
{
  protected $table = "lab_espacios";
  protected $primaryKey = 'id_espacio';
  protected $fillable = ['id_espacio',
                          'id_tipo',
                          'id_area',
                          'id_item'
                        ];
  function labArea(){                                              //Foreingn_key, local_key
        return $this->hasOne('App\Models\LabArea','id_area','id_area')->first();
  }
  function tipo(){                                              //Foreingn_key, local_key
    return $this->hasOne('App\Models\LabTipoEspacio','id_tipo','id_tipo')->first();
  }
  function item(){                                              //Foreingn_key, local_key
    return $this->hasOne('App\Models\InvItem','id_item','id_item')->first();
  }
  function prestamosEspacios()
  {
    return $this->hasMany('App\Models\LabPrestamoEspacio','id_espacio','id_espacio')->get();
  }
}
?>
