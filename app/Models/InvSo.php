<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class InvSo extends Model{

	protected $table ='inv_so';//nombre de la tabla
	protected $primaryKey = 'id_so';
  protected $filltable=['id_so','so','version','licencia','descripcion'];

	function programas()
	{
		return $this->hasMany('App\Models\InvProgramaSo','id_so','id_so')->get();
	}

}
?>
