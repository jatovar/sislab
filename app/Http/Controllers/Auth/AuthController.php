<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Models\LaboratorioBec;
use App\Models\Laboratorio;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
  protected $redirectPath = '/';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([

            'cve_uaslp' => $data['cve_uaslp'],
            'password' => bcrypt($data['password']),
        ]);
    }
  public function getLogout()
  {
      Auth::logout();
      Session::flush();
      return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
  }
  public function postLogin(Request $request)
  {


      //dd( $this->getCredentials($request) );

      $this->validate($request, [
          'cve_uaslp' => 'required',
          'password' => 'required'
      ]);

      $credentials = $request->only('cve_uaslp', 'password');
      $clave =   $request->only('cve_uaslp');
      $id_lab = LaboratorioBec::select('id_laboratorios')->where('clave_uaslp',$clave)->lists('id_laboratorios')->first();


      $lab = Laboratorio::find($id_lab);

      //return $credentials;
      if (Auth::attempt($credentials, $request->has('remember'))) {
        //$_SESSION['laboratorio'] = $lab;
        Session::put('laboratorio', $lab->laboratorio);
        Session::put('id_lab', $id_lab);

        return redirect()->intended($this->redirectPath());
        //return view('laboratorio.index',array('laboratorio' => $lab));

      }

      return redirect($this->loginPath())
               ->withInput($request->only('cve_uaslp', 'remember'))
               ->withErrors([
                   'cve_uaslp' => 'Las credenciales son incorrectas (Clave/Password).',
               ]);
  }

}
