<?php namespace App\Http\Controllers;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;


/**
 *
 */
class HomeController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }
  public function index(){
    return view('laboratorio.index');
  }
}
