<?php namespace App\Http\Controllers;
use App\Models\Profesor;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

/**
 *
 */
class ProfesorController extends Controller
{

  function dameNombre(Request $r)
  {
    $clave = $r->input('clave_profesor');
    $res = ['success' => false];
    try {
      $profesor = Profesor::find($clave);
      $res['nombre'] = "";
      if($profesor!=null)
      {
        $res['nombre'] = $profesor->nombreCompleto();
        $res ['success'] = true;
      }

    } catch (Exception $e) {
      $res['msj'] = $e->getMessage();
    }
    return response()->json($res);
  }
  function admin()
  {
    
    return view ('admin.index');
  }
}
