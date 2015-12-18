<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabTipoMulta;
use App\Http\Requests;
use Session;
use App\Http\Controllers\Controller;

class TipoMultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function buscar(Request $r)
    {
      $res = ['success' => false];
      try {
        $id_lab = Session::get('id_lab');
        $tipo_multa = LabTipoMulta::where('multa',$r->input('multa'))->where('id_laboratorio',$id_lab)->first();
        $res['costo'] = $tipo_multa->costo;
        $res['sancion'] = $tipo_multa->sancion;
        $res['success'] = true;
      } catch (Exception $e) {
        $res['msj'] = e.getMessage();
      }
      return response()->json($res);

    }
}
