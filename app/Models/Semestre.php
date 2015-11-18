<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 *
 */
class Semestre extends Model
{
    protected $table = 'semestres';
    protected $primaryKey = 'id_semestre';
    protected $fillable = ['id_semestre','semestre','fecha_ini','fecha_fin','cve_uaslp','ase_ini','ase_fin','cap_ini','cap_fin','cap_ini_becarios','cap_fin_becarios','str_vigencia'];

    function horarios()
    {
      return $this->hasMany('App\Models\Horario','id_semestre','id_semestre')->get();
    }
    function becariosLab()
    {
      return $this->hasMany('App\Models\LaboratorioBec','id_semestre','id_semestre')->get();
    }
}





 ?>
