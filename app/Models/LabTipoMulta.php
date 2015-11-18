<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class LabTipoMulta extends Model{

	protected $table ='lab_tipos_multa';
	protected $primaryKey = 'id_multa';
  protected $filltable=['id_multa','multa','costo','sancion'];
	function multas()
	{
		return $this->hasMany('App\Models\LabMultaLaboratorio','id_multa','clave_id')->get();
	}

}
?>
