<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 *
 */
class LabMantenimientoItem extends Model
{

  protected $table = 'lab_mantenimientos_items';
  protected $fillable = ['id_lab_mantenimiento',
                        'id_item',
                        'fecha_realizado'];

  protected function mantenimiento()
  {
    return $this->hasOne('App\Models\LabMantenimiento','id_mantenimiento','id_lab_mantenimiento')->first();
  }
  function item()
  {
    return $this->hasOne('App\Models\InvItem','id_item','id_item')->first();
  }

}
?>
