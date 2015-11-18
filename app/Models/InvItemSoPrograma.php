<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class InvItemSoPrograma extends Model{

	protected $table ='inv_item_so_programas';
	protected protected $primaryKey = 'id';
    protected $filltable=['id','id_item_so','id_programas'];

    function programa()
    {
        return $this->hasOne('App\Models\InvPrograma','id_programas','id_programa')->first();
    }

    function itemSO()
    {
        return $this->hasOne('App\Models\InvItemSo','id','id_item_so')->first();
    }






}
?>
