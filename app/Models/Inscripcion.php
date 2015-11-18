<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 *
 */
class Inscripcion extends Model
{
    protected $table = 'inscripcion';

    protected $fillable = ['id_semestre','cve_materia','cve_grupo','tipo','cve_uaslp','nombre_materia','l','m','mi','j','v','s'];

    function horario()
    {
      return $this->hasOne('App\Models\Horario','id_semestre','id_semestre')->first();
    }

}





 ?>
