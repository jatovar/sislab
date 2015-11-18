<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 *
 */
class Notificacion extends Model
{

  protected $table = 'notificacion_lab_becarios';
  protected $fillable = ['id_requerimiento',
                        'cve_uaslp',
                        'visto'];

  protected function requerimiento()
  {
      return $this->hasOne('App\Models\LabRequerimiento','id_requerimiento','id_requerimiento')->first();
  }
  

}
?>
