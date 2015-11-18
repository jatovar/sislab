<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 *
 */
class LabRequerimientoItem extends Model
{

  protected $table = 'lab_requerimiento_items';
  protected $fillable = ['id_requerimiento',
                        'id_item'
                      ];

  protected function requerimiento()
  {
    return $this->hasOne('App\Models\LabRequerimiento','id_requerimiento','id_requerimiento')->first();
  }
  protected function item()
  {
    return $this->hasOne('App\Models\InvItem','id_item','id_item')->first();
  }
  

}
?>
