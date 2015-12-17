<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvItem;
use App\Models\LabArea;
use App\Models\Laboratorio;
use Carbon\Carbon;
use Session;
use App\Models\LabMantenimiento;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id_lab = Session::get('id_lab');
      $laboratorio = Laboratorio::find($id_lab);
      $labAreas = LabArea::where('id_laboratorio',$id_lab)->lists('id_area');
      $mantenimientos = LabMantenimiento::whereIn('id_area',$labAreas)->get();
      return view('laboratorio.controlEquipos.mantenimientos', array('laboratorio' => $laboratorio, 'mantenimientos' => $mantenimientos));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
