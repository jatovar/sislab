<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class LabTipoMulta extends Model{

	protected $table ='lab_tipos_multa';
	protected $primaryKey = 'id_multa';
  protected $filltable=['id_multa','id_laboratorio','multa','costo','sancion'];
	public $timestamps = false;

	function multas()
	{
		return $this->hasMany('App\Models\LabMultaLaboratorio','id_multa','clave_id')->get();
	}
	function laboratorio()
	{
		return $this->hasOne('App\Models\Laboratorio','id_laboratorio','id_laboratorio')->first();
	}

}
?>
