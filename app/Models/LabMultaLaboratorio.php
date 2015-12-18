<?php namespace App\Models;
use App\Models\Profesor;
use App\Models\Becario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class LabMultaLaboratorio extends Model{

	protected $table ='lab_multas_laboratorio';
	protected $primaryKey = 'id';
  protected $filltable=['id','cve_alumno','id_laboratorio','id_multa','fecha','estado','fecha_pago','rpe_registro','monto_pago'];
	public $timestamps = false;

	function alumno()
	{
			return $this->hasOne('App\Models\Alumno','clave_unica','cve_alumno')->first();
	}
	function laboratorio()
	{
			return $this->hasOne('App\Models\Laboratorio','id_laboratorio','id_laboratorio')->first();
	}
	function tipoMulta()
	{
			return $this->hasOne('App\Models\LabTipoMulta','id_multa','id_multa')->first();
	}
	/***
	*nombre de quien registro
	*/

	function nombreResponsable()
	{
		$bec = Becario::where('cve_uaslp',$this->rpe_registro)->first();
		if($bec)
		{
			return $bec->alumno()->nombreCompleto();
		}
		$prof = Profesor::where('rpe',$this->rpe_registro)->first();
		if($prof)
		{
			return $prof->nombreCompleto();
		}
		return "";
	}
}
?>
