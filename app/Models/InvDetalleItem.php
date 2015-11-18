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
                'id_categoria',
                'financiamiento',
                'descripcion',
                'uso',
                'accesorios_partes',
                'caracteristicas',
                'puntos_checar',
                'instructivo',
                'materiales_consumibles',
                'documento',
                'imagen'
              ];

  function categoria()
  {
    return $this->hasOne('App\Models\Categoria','id_categoria','id_categoria')->first();
  }
}
