<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class InvItem extends Model
{
	protected $table = 'inv_item';
	protected $primaryKey = 'id_item';
	public $timestamps = false;
	protected $fillable = ['id_item',
							'id_detalle_item',
							'id_item_principal',
							'id_area',
							'codigo_lab',
							'num_serie',
							'codigo_uaslp_1',
							'codigo_uaslp_2',
							'fecha_registro',
							'fecha_baja',
							'no_equipo',
							'id_estado',
							'inv_itemcol',
							'mac',
							'banderas',
							'nota_especial'];

	function estado()
	{
		return $this->hasOne('App\Models\InvEstado','id_estado','id_estado')->first();
	}
	function labArea()
	{
		return $this->hasOne('App\Models\LabArea','id_area','id_area')->first();
	}
	function detalle()
	{
		return $this->hasOne('App\Models\InvDetalleItem','id_detalle_item','id_detalle_item')->first();
	}
	function observaciones()
	{
		return $this->hasMany('App\Models\InvObservacion','id_item','id_item')->get();
	}
	function prestamos()
	{
		return $this->hasMany('App\Models\LabPrestamoItem','id_item','id_item')->get();
	}
	function SOs()
	{
		return $this->hasMany('App\Models\InvItemSo','id_item','id_item')->get();
	}
	function requerimientos()
	{
		return $this->hasMany('App\Models\LabRequerimientoItem','id_item','id_item')->get();
	}
	function matenimientos()
	{
		return $this->hasMany('App\Models\LabMantenimientoItem','id_item','id_item')->get();
	}
	function espacios()
	{
		return $this->hasMany('App\Models\LabEspacio','id_item','id_item')->get();
	}

}

?>
