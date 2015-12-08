<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 *
 */
class InvDetalleItem extends Model
{
    protected $table = 'inv_detalle_item';
    protected $primaryKey = 'id_detalle_item';
    public $timestamps = false;
    protected $fillable = ['id_detalle_item',
                'nombre',
                'marca',
                'modelo',
                'id_categoria_inv',
                'id_clasificacion',
                'financiamiento',
                'descripcion',
                'uso',
                'accesorios_partes',
                'caracteristicas',
                'puntos_checar',
                'instructivo',
                'materiales_consumibles',
                'documento',
                'imagen',
                'cantidad',
                'capacidad'
              ];

  function categoria()
  {
    return $this->hasOne('App\Models\LabCategoriaInv','id_lab_categoria_inv','id_categoria_inv')->first();
  }
  function clasificacion()
  {
    return $this->hasOne('App\Models\InvClasificacion','id_clasificacion','id_clasificacion')->first();
  }
  function items()
  {
    return $this->hasMany('App\Models\InvItem','id_detalle_item','id_detalle_item')->get();
  }
}
