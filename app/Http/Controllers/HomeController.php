<?php namespace App\Http\Controllers;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Session;


/**
 *
 */
class HomeController extends Controller
{


  public function __construct(){
   $id_lab = Session::get('id_lab');

    if ($id_lab != null)
        $this->middleware('auth');
  }
  public function index(){
       $id_lab = Session::get('id_lab');
    switch ($id_lab) {
      case '1':
              return view('home.homeudicei');
        break;

      default:
              return view('home.home');
        break;
    }

  }
  public function cerrarSession()
  {

  }
}
