<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class InvObservacion extends Model{
    protected $table = 'inv_observaciones';
    protected $primaryKey = 'id_observacion';
    protected $fillable = ['id_observacion',
                            'id_item',
                            'id_tipo_observacion',
                            'observacion',
                            'rpe',
                            'fecha'
                          ];

    function item(){
        return $this->hasOne('App\Models\InvItem', 'id_item', 'id_item')->first();
    }

    function prestamosItems(){
        return $this->hasMany('App\Models\LabPrestamoItem', 'id_prestamo', 'id_prestamo')->get();
    }
}
?>
