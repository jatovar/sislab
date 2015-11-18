<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Ilumninate\Support\Facades\URL;

class LabArea extends Model
{
  protected $table = "lab_areas";
  protected $primaryKey = 'id_area';
  protected $fillable = ['id_area',
                          'id_laboratorio',
                          'id_capacidad',
                          'salon'
                        ];
  function idArea()
  {
    return $this->id_area; 
  }
  function laboratorio(){                                              //Foreingn_key, local_key
      return $this->hasOne('App\Models\Laboratorio','id_laboratorio','id_laboratorio')->first();
  }
  function espacios()
  {
    return $this->hasMany('App\Models\LabEspacio','id_area','id_area')->get();
  }
  function entradas()
  {
    return $this->hasMany('App\Models\LabEntrada','id_area','id_area')->get();
  }
  function items()
  {
    return $this->hasMany('App\Models\InvItem','id_area','id_area')->get();
  }
  function requerimientos()
  {
    return $this->hasMany('App\Models\LabRequerimiento','id_area','id_area')->get();
  }
  function mantenimiento()
  {
    return $this->hasMany('App\Models\LabMantenimiento','id_area','id_area')->get();
  }
}
?>
