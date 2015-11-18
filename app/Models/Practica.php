<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Practica extends Model
{
	protected $table = 'practicas';
	protected $primaryKey = 'id_practica';
	protected $fillable = ['id_practica',
							'nombre',
							'clave_materia',
							'activa',
							'fecha_agrego'];
	function materia()
	{
			return $this->hasOne('App\Models\Materia','clave_materia','clave_materia')->first();
	}
	function revisiones()
	{
		return $this->hasMany('App\Models\LabRevisionPractica','id_practica','id_practica')->get();
	}

}

?>
