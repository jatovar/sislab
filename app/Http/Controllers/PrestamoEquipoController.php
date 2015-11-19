<?php namespace App\Http\Controllers;
use App\Models\InvItem;
use App\Models\LabArea;

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
  function listaPrestamos(Request $r)
  {
    $id_lab = $r->input('id_lab');
    $laboratorio = Laboratorio::find($id_lab);
    $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
    $items = InvItem::whereIn('id_area',$labAreas)->lists('id_item');
    $prestamos = LabPrestamoItem::whereIn('id_item',$items)->paginate(6);

    return view('laboratorio.prestamo_equipos',  array('laboratorio'=>$laboratorio,'prestamos' => $prestamos));
  }
  function listaPrestamosPaginacion(Request $r)
  {
    $id_lab = $r->input('id_lab');
    $laboratorio = Laboratorio::find($id_lab);
    $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
    $items = InvItem::whereIn('id_area',$labAreas)->lists('id_item');
    $prestamos = LabPrestamoItem::whereIn('id_item',$items)->paginate(6);

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
      $prestamos = LabPrestamoItem::whereIn('id_item',$items)->paginate(6);

      return view('laboratorio.tablaPrestamos',  array('prestamos' => $prestamos))->render();

  }
}
