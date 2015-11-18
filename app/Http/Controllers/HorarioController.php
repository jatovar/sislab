<?php namespace App\Http\Controllers;
use App\Models\Horario;
use App\Models\LabArea;
use App\Models\LabEntrada;
use App\Models\Materia;
use Carbon\Carbon;
use App\Models\Laboratorio;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

/**
 *
 */
class HorarioController extends Controller
{

  function dameMateria()
  {
    $grupo = "212";
    $res = ['success' => false];
    try {
      $horario = Horario::where('grupo',$grupo)->first();
      if($horario!=null)
      {
        $res ['success'] = true;
        $res ['materia'] = $horario->materia()->nombre_materia;
      }
    } catch (Exception $e) {
      $res ['msj'] = $e->getMessage();
    }
return response()->json($res);

  }

}

?>
