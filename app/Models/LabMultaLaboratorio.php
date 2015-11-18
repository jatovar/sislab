<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class LabMultasLaboratorio extends Model{

	protected $table ='lab_multas_laboratorio';
	protected $primaryKey = 'id';
  protected $filltable=['id','cve_alumno','id_laboratorio','id_multa','fecha','estado','fecha_pago','rpe_registro','monto_pago'];

	function alumno()
	{
			return $this->hasOne('App\Models\LabAlumno','clave_unica','cve_alumno')->first();
	}
	function laboratorio()
	{
			return $this->hasOne('App\Models\Laboratorio','id_laboratorio','id_laboratorio')->first();
	}
	function tipoMulta()
	{
			return $this->hasOne('App\Models\LabTipoMulta','id_multa','id_multa')->first();
	}
	
}
?>
