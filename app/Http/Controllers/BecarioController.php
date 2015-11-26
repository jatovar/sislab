<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Becario;
use App\Models\Alumno;
use Illuminate\Contracts\Routing\ResponseFactory;

class BecarioController extends Controller
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
      echo "hola";
    /*  $becario = Becario::create($request->all());
      $becario->activo = 1;
      $becario->password = bcrypt($becario->password);
      $becario->save();*/
      $res = ["success"=>false];
      try {
        Becario::create([
          'cve_uaslp' => $request['txtclve'],
          'rpe' => $request['txtrpe'],
          'password' =>  bcrypt($request['txtpassword']),
          'activo' => '1',
        ]);
        $res ["success"] = true;
        $res ["msg"] = "Becario Registrado";
        $res ["tipo"] = "success";
      } catch (Exception $e) {
        $res ["tipo"] = "danger";
        $res ["msg"] = $e->getMessage();
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
