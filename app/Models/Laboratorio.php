<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Ilumninate\Support\Facades\URL;

class Laboratorio extends Model
{
  protected $table = "laboratorios";
  protected $primaryKey = 'id_laboratorio';
  protected $fillable = ['id_laboratorio',
                          'laboratorio',
                          'nom_corto',
                          'color',
                          'activo',
                          'visible',
                          'rpe_jefe',
                          'objetivo'
                        ];

  function jefe(){                                              //Foreingn_key, local_key
    return $this->hasOne('App\Models\Profesor','rpe','rpe_jefe')->first();
  }
  function multas()
  {
    return $this->hasMany('App\Models\LabMultasLaboratorio','id_laboratorio','id_laboratorio')->get();
  }
  function areas()
  {
    return $this->hasMany('App\Models\LabArea','id_laboratorio','id_laboratorio')->get();
  }
  function becarios()
  {
    return $this->hasMany('App\Models\LaboratorioBec','id_laboratorios','id_laboratorio')->get();
  }
  function categoriaslab()
  {
    return $this->hasMany('App\Models\LabCategoriaInv','id_laboratorio','id_laboratorio')->get();
  }
  function tiposMultas()
  {
    return $this->hasMany('App\Models\LabTipoMulta','id_laboratorio','id_laboratorio')->get();
  }

}
?>
