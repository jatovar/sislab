<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class LabEntrada extends Model{

	protected $table ='lab_entradas';
	public $timestamps = false;
	protected $primaryKey = 'id_entrada';
  protected $filltable=['id_entrada','cve_alumno','id_area','id_prestamo_item','cve_materia','fecha_entrada','hora_entrada','hora_entrada','notas','duracion'];


	function alumno()
	{
	    return $this->hasOne('App\Models\Alumno','clave_unica','cve_alumno')->first();
	}
	function materia()
	{
			return $this->hasOne('App\Models\Materia','clave_materia','cve_materia')->first();
	}

	function labArea()
	{
	    return $this->hasOne('App\Models\LabArea','id_area','id_area')->first();
	}
	function prestamosEspacios()
	{
		return $this->hasMany('App\Models\LabPrestamoEspacio','id_lab_entradas','id_entrada')->get();
	}
	function prestamoItem()
	{
		return $this->hasOne('App\Models\LabPrestamoItem','id_prestamo','id_prestamo_item')->first();
	}


}
?>
