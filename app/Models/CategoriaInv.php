<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class CategoriaInv extends Model
{
	protected $table = 'categorias_inv';
	protected $primaryKey = 'id_categoria_inv';
	protected $fillable = ['id_categoria_inv','nombre','descripcion'];

	function laboratorios()
	{
		return $this->hasMany('App\Models\LabCategoriaInv','id_categoria_inv','id_categoria_inv')->get();
	}

}


?>
