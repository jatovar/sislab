<?php namespace App\Http\Controllers;
use App\Models\InvItem;
use App\Models\LabArea;
use App\Models\LabEntrada;
use App\Models\LabPrestamoItem;
use App\Models\Horario;
use App\Models\Materia;
use Carbon\Carbon;
use App\Models\Laboratorio;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

/**
 *
 */
class AccesoAlumnoController extends Controller
{
  public function __construct()
  {
    //$this->middleware('auth');
  }

  function listaAcceso1(Request $r)
  {

    $id_lab = $r->input('id_lab');
    $laboratorio = Laboratorio::find($id_lab);
    $salones = LabArea::where('id_laboratorio',$id_lab)->lists('salon');
    $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
    $entradas = LabEntrada::whereIn('id_area',$labAreas)->where('hora_salida','00:00:00')->paginate(8);
    $claves_mat = Horario::whereIn('salon',$salones)->lists('clave_materia');
    $materias = Materia::whereIn('clave_materia',$claves_mat)->get();

    return view('laboratorio.controlAlumnos.tablaAcceso',  array('entradas' => $entradas))->render();

  }

  function listaAcceso(Request $r)
  {

    $id_lab = $r->input('id_lab');
    $laboratorio = Laboratorio::find($id_lab);
    $salones = LabArea::where('id_laboratorio',$id_lab)->lists('salon');
    $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
    $entradas = LabEntrada::whereIn('id_area',$labAreas)->where('hora_salida','00:00:00')->paginate(8);
    $claves_mat = Horario::whereIn('salon',$salones)->lists('clave_materia');
    $materias = Materia::whereIn('clave_materia',$claves_mat)->get();
  /**  $res = ['succes'=> false];
     try {
      if($r->ajax())
      {
        $res['html'] = view('laboratorio.controlAlumnos.tablaAcceso',  array('entradas' => $entradas))-render();
        $res['succes'] = true;
        return response()->json($res);

      }
    } catch (Exception $e) {
      $res ['msj'] = $e->getMessage();
      return response()->json($res);
    }*/

    return view('laboratorio.controlAlumnos.acceso_alumnos',
            array('laboratorio' => $laboratorio,'entradas' => $entradas, 'materias' => $materias));
  }

  function registrarEntrada(Request $r)
  {
      $date = Carbon::now();
      $date->timezone("America/Mexico_City");
      $entrada = new LabEntrada();
      $entrada->id_area = $r->input('id_area');
      $entrada->cve_alumno = $r->input('cve_alumno');
      $entrada->cve_materia = $r->input('cve_materia');
      $entrada->fecha_entrada = $date;
      $entrada->hora_entrada = $date;
      $entrada->notas = $r->input('nota');

      if($r->input('codigo_lab')!="")
      {
        $prestamo = new LabPrestamoItem();
        $invitem = InvItem::where('id_area',$r->input('id_area'))->where('codigo_lab',$r->input('codigo_lab'))->first();
        if($invitem)
        {
          $prestamo->id_item = $invitem->id_item;
          $prestamo->cve_solicitante = $r->input('cve_alumno');
          $prestamo->tipo_solicitante = 1;
          $prestamo->fecha_prestamo = $date;
          $prestamo->save();
          $entrada->id_prestamo_item = $prestamo->id_prestamo;
        }

      }
      $entrada->save();
      $id_lab = $r->input('id_lab');
      $laboratorio = Laboratorio::find($id_lab);
      $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
      $entradas = LabEntrada::whereIn('id_area',$labAreas)->where('fecha_salida','00:00:00')->paginate(8);

      return view('laboratorio.controlAlumnos.tablaAcceso',  array('entradas' => $entradas))->render();
  }

  function alumnoRegistrado(Request $r)
  {
    $res = ['success' => false];
    try {

      $cve_alumno = $r->input('cve_alumno');
      $entradas = LabEntrada::where('cve_alumno',$cve_alumno)->where('fecha_salida','00:00:00')->count();

      $res['success'] = true;
      $res['registrado'] = false;
      if($entradas > 0)
      {
        $res['registrado'] = true;
      }
    } catch (Exception $e){
      $res['msj'] = $e->getMessage();
    }
    return response()->json($res);

  }
  function salidaAlumno(Request $r)
  {
    $res = ['success' => false];
    try {

      $date = Carbon::now();
      $date->timezone("America/Mexico_City");
      $id_entrada = $r->input('id_entrada');
      $entrada = LabEntrada::find($id_entrada);
      $entrada->hora_salida = $date;
      $entrada->save();
      $res['success'] = true;

    } catch (Exception $e){
      $res['msj'] = $e->getMessage();
    }
    return response()->json($res);
  }
  function consultaAlumno(Request $r)
  {
    $clave = $r->input('cve_alumno');
    $id_lab = $r->input('id_lab');
    $laboratorio = Laboratorio::find($id_lab);
    $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
    $entradas = LabEntrada::whereIn('id_area',$labAreas)->where('cve_alumno',$clave)->paginate(10);

    return view('laboratorio.controlAlumnos.tablaConsulta',
                array('laboratorio' => $laboratorio,'entradas' => $entradas));

  }
}
