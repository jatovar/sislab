<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;


class InvEstado extends Model{
    protected $table = 'inv_estados';
    protected $primaryKey = 'id_estado';
    protected $fillable = ['id_estado', 'estado'];

    function items(){
        return $this->hasMany('App\Models\InvItem', 'id_item', 'id_item')->get();
    }
}
?>
