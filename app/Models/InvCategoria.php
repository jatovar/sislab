<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class InvCategoria extends Model
{
	protected $table = 'inv_categorias';
	protected $primaryKey = 'id_categoria';
	protected $fillable = ['id_categoria','nombre','descripcion'];

	function detallesItems()
	{
		return $this->hasMany('App\Models\InvDetalleItem','id_categoria','id_categoria')->get();
	}
}

?>
