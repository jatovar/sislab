<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class InvClasificacion extends Model
{
	protected $table = 'inv_clasificaciones';
	protected $primaryKey = 'id_clacificacion';
	protected $fillable = ['id_clasificacion','nombre','descripcion'];

	function detallesItems()
	{
		return $this->hasMany('App\Models\InvDetalleItem','id_clasificacion','id_clasificacion')->get();
	}
  function categoriasLab()
  {
    return $this->hasOne('App\Models\LabCategoriaInv','id_categoria_inv','id_categoria_inv')->first();
  }
}

?>
