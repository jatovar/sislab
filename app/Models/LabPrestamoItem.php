<?php namespace App\Models;
use App\Models\Alumno;
use Illuminate\Database\Eloquent\Model;

class LabPrestamoItem extends Model{
    protected $table = 'lab_prestamos_items';
    public $timestamps = false;
    protected $primaryKey = 'id_prestamo';
    protected $fillable = ['id_prestamo',
                            'tipo_solicitante',
                            'cve_solicitante',
                            'fecha_prestamo',
                            'fecha_entrega',
                            'id_item',
                            'rpe_prestamo',
                            'id_observacion',
                            'estado'
                          ];

    function item(){
        return $this->hasOne('App\Models\InvItem', 'id_item', 'id_item')->first();
    }

    function observacion(){
        return $this->hasOne('App\Models\InvObservacion', 'id_observacion', 'id_observacion')->first();
    }
    function nombreSolicitante()
    {
      $nombre = "";
      if($this->tipo_solicitante == 1)
      {
        $alumno = Alumno::find($this->cve_solicitante);
        $nombre = $alumno->nombreCompleto();
      }
      else if($this->tipo_solicitante == 0)
      {
        $profesor = Profesor::find($this->cve_solicitante);
        $nombre = $profesor->nombreCompleto();
      }
      return $nombre;
    }
}
?>
