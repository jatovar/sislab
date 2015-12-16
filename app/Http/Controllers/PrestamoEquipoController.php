<?php namespace App\Http\Controllers;
use App\Models\InvItem;
use App\Models\LabArea;
use Session;
use App\Models\Alumno;
use App\Models\LabEntrada;
use App\Models\Materia;
use App\Models\Laboratorio;
use App\Models\LabPrestamoItem;
use App\Models\InvObservacion;
use Carbon\Carbon;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

/**
 *
 */
class PrestamoEquipoController extends Controller
{
  function listaPrestamos()
  {
    date_default_timezone_set("America/Mexico_City");

    $id_lab = Session::get('id_lab');
    $laboratorio = Laboratorio::find($id_lab);
    $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
    $items = InvItem::whereIn('id_area',$labAreas)->lists('id_item');
    $prestamos = LabPrestamoItem::whereIn('id_item',$items)->whereNull('fecha_entrega')->paginate(6);

    return view('laboratorio.prestamo_equipos',  array('laboratorio'=>$laboratorio,'prestamos' => $prestamos));
  }
  function listaPrestamosPaginacion(Request $r)
  {
    $id_lab = $r->input('id_lab');
    $laboratorio = Laboratorio::find($id_lab);
    $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
    $items = InvItem::whereIn('id_area',$labAreas)->lists('id_item');
    $prestamos = LabPrestamoItem::whereIn('id_item',$items)->whereNull('fecha_entrega')->paginate(6);
    return view('laboratorio.tablaPrestamos',  array('prestamos' => $prestamos))->render();
  }

  function registrarPrestamo(Request $r)
  {

    $res = ['success' => false];
    try {
      $date = Carbon::now();

      $prestamo = new LabPrestamoItem();
      $prestamo->cve_solicitante = $r->input('cve_solicitante');
      $prestamo->tipo_solicitante = $r->input('tipo_solicitante');
      $prestamo->fecha_prestamo = $date;
      $date->timezone("America/Mexico_City");
      $invitem = InvItem::where('id_area',$r->input('id_area'))->where('codigo_lab',$r->input('codigo_lab'))->first();

      if($invitem)
      {
        $prestamo->id_item = $invitem->id_item;
      }
      $prestamo->save();
      $res['success']= true;
      $res ['id_prestamo'] = $prestamo->id_prestamo;
    } catch (Exception $e) {
      $res['msj'] = $e->getMessage();
    }

      $id_lab = $r->input('id_lab');
      $laboratorio = Laboratorio::find($id_lab);
      $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
      $items = InvItem::whereIn('id_area',$labAreas)->lists('id_item');
      $prestamos = LabPrestamoItem::whereIn('id_item',$items)->whereNull('fecha_entrega')->paginate(6);

      return view('laboratorio.tablaPrestamos',  array('prestamos' => $prestamos))->render();

  }
  function consultaPrestamo(Request $r)
  {
    $id_lab = Session::get('id_lab');

      $fechaIni = $r->input('fechaIni');
      $fechaFin = $r->input('fechaFin');
      $nuevafecha = strtotime ( '+1 day' , strtotime ( $fechaFin ));
      $fechaFin = date ( 'Y-m-d' , $nuevafecha );
      $fechaIni = date_format(date_create($fechaIni), 'Y-m-d');
      $fechaFin = date_format(date_create($fechaFin), 'Y-m-d');

      $laboratorio = Laboratorio::find($id_lab);
      $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
      $entradas = "";
      if($r->input('op') == "equipo")
      {
        $dato = $r->input('dato');
        //$query = "SELECT count(`cve_alumno`) as `cant`,`cve_alumno` FROM `lab_entradas`,
  			//  `alumnos` where `cve_alumno` = `clave_unica` group by (`clave_unica`) order by `cant` desc limit 5";
        //select count(`cve_alumno`) as `cant` from `lab_entradas` inner join `alumnos` on `alumnos`.`clave_unica` = `lab_entradas`.`cve_alumno`
        // where `id_area` in (1, 2, 3, 4, 5, 6) group by `cve_alumno` order by `cant` desc limit 4 offset 0
        $item = InvItem::whereIn('id_area',$labAreas)->where('codigo_lab','LIKE', '%'.$dato.'%')->first();
        $prestamos = LabPrestamoItem::where('id_item',$item->id_item)
        ->where('fecha_prestamo','>',$fechaIni)
        ->where('fecha_prestamo','<',$fechaFin)->get();
      }
      else if($r->input('op') == "clave")
      {
        $clave = $r->input('dato');
        $prestamos = LabPrestamoItem::where('cve_solicitante','LIKE', '%'.$clave.'%')
        ->where('fecha_prestamo','>=',$fechaIni)
        ->where('fecha_prestamo','<',$fechaFin)->get();

      }
      return view('laboratorio.tablaConsulta',  array('prestamos' => $prestamos))->render();

  }
}
