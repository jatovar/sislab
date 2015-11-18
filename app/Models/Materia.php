<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 *
 */
class Materia extends Model
{
    protected $table = 'materias';
    protected $primaryKey = 'clave_materia';
    protected $fillable = ['clave_materia','nombre_materia',
                          'creditos','horas_clase','horas_laboratorio',
                          'horas_semestre','activa','laboratorio'];

    function practicas()
    {
      return $this->hasMany('App\Models\Practica','clave_materia','clave_materia')->get();
    }
    function horarios()
    {
      return $this->hasMany('App\Models\Horario','clave_materia','clave_materia')->get();
    }

}





 ?>
