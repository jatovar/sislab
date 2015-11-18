<?php namespace App\Http\Controllers;
use App\Models\Alumno;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

/**
 *
 */
class AlumnoController extends Controller
{

  function dameNombre(Request $r)
  {
    $clave = $r->input('clave_alumno');
    $res = ['success' => false];
    try {
      $alumno = Alumno::find($clave);
      $res['nombre'] = "";
      if($alumno!=null)
        $res['nombre'] = $alumno->nombreCompleto();

      $res ['success'] = true;
    } catch (Exception $e) {
      $res['msj'] = $e->getMessage();
    }
    return response()->json($res);
  }
}
