<?php namespace App\Http\Controllers;
use App\Models\InvItem;
use App\Models\LabArea;
use App\Models\Laboratorio;
use Carbon\Carbon;
use App\Models\LabMantenimiento;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

class MantenimientoController extends Controller
{
  function listaMantenimientos($id_lab)
  {
    $laboratorio = Laboratorio::find($id_lab);
    $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
    $mantenimientos = LabMantenimiento::whereIn('id_area',$labAreas)->get();
    return view('laboratorio.controlEquipos.mantenimientos', array('laboratorio' => $laboratorio, 'mantenimientos' => $mantenimientos));

  }
  function listaMantenimientosArea($id_area)
  {
    $labArea = LabArea::find($id_area);
    $mantenimientos = LabMantenimiento::where('id_area',$id_area)->get();
    return view('laboratorio.controlEquipos.mantenimientos', array('labArea' => $labArea, 'mantenimientos' => $mantenimientos));

  }
  function altaMantenimiento(Request $r)
  {
    $res = ['success' => false];
    try {
      $date = Carbon::now();
      $date->timezone("America/Mexico_City");
      $mantenimiento = LabMantenimiento::create($r->all());
      $mantenimiento->fecha_realizado = $date;

      $mantenimiento->save();
      $res['success'] = true;
    } catch (Exception $e) {
      $res['msj'] = $e->getMessage();
    }
    return response()->json($res);

  }


}
?>
