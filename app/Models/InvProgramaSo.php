<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class InvProgramaSo extends Model{

	protected $table ='inv_programas_so';//nombre de la tabla
	protected protected $primaryKey = 'id';
    protected $filltable=['id','id_programa','id_so'];


   function SO()
    {
        return $this->hasOne('App\Models\InvSO','id_so','id_so')->first();
    }

    function programa()
    {
    	return $this->hasOne('App\Models\InvPrograma','id_programa','id_programa')->first();
    }





}
?>
