<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class LabPrestamosEspacio extends Model{

	protected $table ='lab_prestamos_espacios';
	protected $primaryKey = 'id_prestamo';
  protected $filltable=['id_prestamo','id_espacio','tipo_solicitante','cve_solicitante1','cve_solicitante2','fecha_prestamo','fecha_registro','cve_registro','estado','hora_inicio','hora_fin','id_lab_entradas'];

	function espacio()
	{
		return $this->hasOne('App\Models\LabEspacio','id_espacio','id_espacio')->first();
	}
	function entrada()
	{
		return $this->hasOne('App\Models\LabEntrada','id_entrada','id_lab_entradas')->first();
	}
	
}
?>
