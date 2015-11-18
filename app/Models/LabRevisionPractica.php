<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class LabRevisionPractica extends Model
{
	protected $table = 'lab_revision_practica';
	protected $primaryKey = 'id_revision';
	protected $fillable = ['id_revision',
							'id_semestre',
							'cve_materia',
							'cve_grupo',
							'tipo',
							'cve_uaslp',
							'id_practica',
							'calificacion',
							'fecha',
							'comentarios',
							'rpe_reviso'];

	function practica()
	{
			return $this->hasOne('App\Models\Practica','id_practica','id_practica')->first();
	}
	function inscripcion()
	{
		//	return $this->hasOne('App\Models\Inscripcion','id_semestre','id_semestre')->first();
	}




}

?>
