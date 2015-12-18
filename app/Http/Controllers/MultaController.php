<?php

namespace App\Http\Controllers;
use App\Models\LabMultaLaboratorio;
use Session;
use App\Models\Alumno;
use App\Models\Laboratorio;
use App\Models\LabTipoMulta;

use App\Models\InvObservacion;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MultaController extends Controller
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
      $multas = LabMultaLaboratorio::where('id_laboratorio',$id_lab)->get();
      return view('laboratorio.multas.multas', array('laboratorio' => $laboratorio, 'multas'=>$multas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $id_lab = Session::get('id_lab');
        $clave = Session::get('clave');
        $date = Carbon::now();
        $multa = new LabMultaLaboratorio();
        $multa->cve_alumno = $request->input('cve_alumno');
        $multa->id_laboratorio = $id_lab;
        $multa->fecha = $date;
        $tipo_multa = LabTipoMulta::where('multa',$request->input('tipo_multa'))->where('id_laboratorio',$id_lab)->first();
        if($tipo_multa)
        {
          $multa->id_multa = $tipo_multa->id_multa;
        }
        $multa->rpe_registro = $clave;
        //$multa->nota = $request->input('nota');
        $multa->save();

        $multas = LabMultaLaboratorio::where('id_laboratorio',$id_lab)->get();
        return view('laboratorio.multas.tablaMultas', array('multas'=>$multas));

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
