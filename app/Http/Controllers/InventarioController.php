<?php namespace App\Http\Controllers;
use App\Models\InvItem;
use App\Models\InvDetalleItem;

use App\Models\LabArea;
use App\Models\LabCategoriaInv;

use App\Models\Laboratorio;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

class InventarioController extends Controller
{

    function dameNombreEquipo(Request $r)
    {
      $cod = $r->input('codigo_lab');
      $res = ['success' => false];
      try {
        $inv = InvItem::where('codigo_lab',$cod)->first();
        $res['nombre'] = "";
        if($inv!=null)
          $res['nombre'] = $inv->detalle()->nombre;

        $res ['success'] = true;
      } catch (Exception $e) {
        $res['msj'] = $e->getMessage();
      }
      return response()->json($res);
    }

    function listaEquiposCategoria($id_lab,$id_cat)
    {
      /*$laboratorio = Laboratorio::find($id_lab);
      $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
      $items = InvItem::whereIn('id_area',$labAreas)->get();
  return view('laboratorio.controlEquipos.inventario', array('laboratorio' => $laboratorio,'items' =>  $items ));
*/
    $laboratorio = Laboratorio::find($id_lab);

    $labCategoria1 = LabCategoriaInv::where('id_laboratorio',$id_lab)->where('id_categoria_inv',$id_cat)->first();

    return view('laboratorio.controlEquipos.inventario', array('laboratorio' => $laboratorio,'categoria' =>  $labCategoria1 ));

    }
    function listaEquipos($id_lab)
    {
      $laboratorio = Laboratorio::find($id_lab);
      $labCategoria1 = LabCategoriaInv::where('id_laboratorio',$id_lab)->orderBy('id_lab_categoria_inv')->first();
    /*  $clasificaciones = $labCategoria1->clasificaciones()->lists('id_clasificacion');
      $detallesItems = InvDetalleItem::whereIn('id_clasificacion',$clasificaciones)->lists('id_detalle_item');
      $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
      $items = InvItem::whereIn('id_area',$labAreas)->whereIn('id_detalle_item',$detallesItems)->get();*/
      return view('laboratorio.controlEquipos.inventario', array('laboratorio' => $laboratorio,'categoria' =>  $labCategoria1 ));
    }
    function listaEquiposArea($id_area)
    {
      $labArea = LabArea::find($id_area);
      $items = InvItem::where('id_area',$id_area)->get();
      return view('laboratorio.controlEquipos.inventario', array('labArea' => $labArea , 'items' =>  $items ));
    }

      function dameEquiposArea(Request $r)
      {
        $id_area = $r->input('id_area');
        $labArea = LabArea::find($id_area);
        $items = InvItem::where('id_area',$id_area)->get();
        $cadena = "";

        foreach ($items as $item => $i) {
          $cadena =  $cadena."<option>".$i->codigo_lab."</option> ";
        }
        return $cadena;
      }

    function detalle($id_item)
    {

    }
    function detalleEquipo($id_item)
    {
        $item = InvItem::find($id_item);
        return view('laboratorio.controlEquipos.inventario_detalle', array('i' =>  $item ));
    }
    function modificarEquipo(Request $r)
    {
      $id = $r->input('id_item');
      $item = InvItem::find($id);

      return view('laboratorio.controlEquipos.tablasInventario.modificar', array('i' =>  $item ));
    }
    function nuevoEquipo($id_lab)
    {
      $lab = Laboratorio::find($id_lab);
      return view('laboratorio.controlEquipos.inventario_nuevo', array('laboratorio' =>  $lab));
    }
    function guardarEquipo(Request $r)
    {
      $res = ['success' => false];
      try {
        $invDetalle = invDetalleItem::create($r->all());
        $res['id_detalle_item'] = $invDetalle->id_detalle_item;
        $res['success'] = true;
      } catch (Exception $e) {
        $res['msj'] = $e->getMessage();
      }

      //$item = InvItem::find(3);
      //return view('laboratorio.controlEquipos.tablasInventario.detalle', array('i' =>  $item));
      return  response()->json($res);
    }
    function guardarCodigosEquipos(Request $r)
    {
      $res = ['success' => false];

      try {
        $invItem = InvItem::create($r->all());
        $res['success'] = true;
      } catch (Exception $e) {

      }
      return  response()->json($res);

    }
    function guardarCambiosEquipo(Request $r)
    {
      $item = InvItem::find(3);
      return view('laboratorio.controlEquipos.tablasInventario.detalle', array('i' =>  $item));
    }


}
