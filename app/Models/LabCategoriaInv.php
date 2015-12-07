<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class LabCategoriaInv extends Model
{
	protected $table = 'lab_categorias_inv';
	protected $primaryKey = 'id_lab_categoria_inv';
	protected $fillable = ['id_lab_categoria_inv','id_laboratorio','id_categoria'];

	function categoria()
	{
		return $this->hasOne('App\Models\CategoriaInv','id_categoria_inv','id_categoria_inv')->first();
	}
  function laboratorio()
	{
		return $this->hasOne('App\Models\Laboratorio','id_laboratorio','id_laboratorio')->first();
	}
  function clasificaciones()
  {
    return $this->hasMany('App\Models\InvClasificacion','id_lab_categoria_inv','id_lab_categoria_inv')->get();
  }
	function detallesItems()
	{
		return $this->hasMany('App\Models\InvDetalleItem','id_categoria_inv','id_lab_categoria_inv')->get();
	}
}

?>
