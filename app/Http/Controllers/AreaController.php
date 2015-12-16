<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Models\LabArea;
use App\Models\Laboratorio;

class AreaController extends Controller
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
        //
        return view('area.create');
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
          LabArea::create([
            'area' => $request['area'],
            'capacidad' => $request['capacidad'],
            'salon' => $request['salon'],
            'id_laboratorio' => Session::get('id_lab'),
            ]);
            $res ["success"] = true;
            $res ["msg"] = "El Area se ha registrado <strong>correctamente!</strong>";
            $res ["tipo"] = "success";
        } catch (Exception $e) {
          $res ["tipo"] = "danger";
          $res ["msg"] = "Los datos son incorrectos";
        }
        return response()->json($res);
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
      $id_lab = Session::get('id_lab');
      $lab = Laboratorio::find($id_lab);

      return view('area.muestra',array('laboratorio' => $lab ));
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
