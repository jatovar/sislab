<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Ilumninate\Support\Facades\URL;

class LabTipoEspacio extends Model
{
  protected $table = "lab_tipos_espacios";
  protected $primaryKey = 'id_tipo';
  protected $fillable = ['id_tipo',
                          'tipo'
                        ];

  function espacios()
  {
      return $this->hasMany('App\Models\LabEspacios','id_tipo','id_tipo')->get();
  }
}
?>
