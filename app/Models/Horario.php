<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 *
 */
class Horario extends Model
{
    protected $table = 'horarios';

    protected $fillable = ['clave_materia','grupo','rpe','tipo','l','m','mi','j','v','s','salon',
                            'cupo','horas_por_clase','id_semestre'];

    function materia()
    {
      return $this->hasOne('App\Models\Materia','clave_materia','clave_materia')->first();
    }
    function semestre()
    {
      return $this->hasOne('App\Models\Semestre','id_semestre','id_semestre')->first();
    }
    function inscripciones()
    {
      return $this->hasMany('App\Models\Inscripcion','id_semestre','id_semestre')->get();
    }
}





 ?>
