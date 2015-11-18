<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class InvPrograma extends Model{

	protected $table ='inv_programas';//nombre de la tabla
	protected protected $primaryKey = 'id_programa';
  protected $filltable = ['id_programa','programa','version','descripcion','licencia','inv_programascol'];

	function programasSO()
	{
		return $this->hasMany('App\Models\InvProgramaSo','id_programa','id_programa')->get();
	}


}
?>
