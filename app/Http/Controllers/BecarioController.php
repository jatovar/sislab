<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Becario;
use Session;
use App\Models\Laboratorio;
use App\Models\LaboratorioBec;
use Illuminate\Contracts\Routing\ResponseFactory;

class BecarioController extends Controller
{
  public function __construct(){

      $this->middleware('auth');
  }
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
        return view('becario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $res = ["success"=>false];
      try {
        Becario::create([
          'cve_uaslp' => $request['cve_uaslp'],
          'rpe' => $request['rpe'],
          'password' =>  bcrypt($request['password']),
          'activo' => '1',
        ]);
        LaboratorioBec::create([
          'id_laboratorios' => Session::get('id_lab'),
          'clave_uaslp' => $request['cve_uaslp'],
          'id_semestre' => '1',
          ]);
        $res ["success"] = true;
        $res ["msg"] = "El becario se ha registrado <strong>correctamente!</strong>";
        $res ["tipo"] = "success";
      } catch (Exception $e) {
        $res ["tipo"] = "danger";
        $res ["msg"] = "Los datos son incorrectos";
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
      $idlab = Session::get('id_lab');
      $lab = Laboratorio::find($idlab);
      return view('becario.muestra',array('laboratorio' => $lab ));

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
    public function destroy(Request $request)
    {
      $res = ["success"=>false];
      try {
        $becario = Becario::where('cve_uaslp', $request->input('id'))->first();

        $becario->activo = false;
        $becario->save();
          $res ["success"] = true;
      } catch (Exception $e) {

      }
        return response()->json($res);
    }
}
