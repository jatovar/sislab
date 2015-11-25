<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class Becario extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
  use Authenticatable, Authorizable, CanResetPassword;

  public $timestamps = false;
  protected $table = 'becarios';
  protected $primaryKey = 'cve_uaslp';
  protected $fillable = ['cve_uaslp','rpe','password','activo'];
  protected $hidden = ['password', 'remember_token'];

  function alumno()
  {
    return $this->hasOne('App\Models\Alumno','clave_unica','cve_uaslp')->first();
  }
  function laboratorios()
  {
    return $this->hasMany('App\Models\LaboratorioBec','clave_uaslp','cve_uaslp')->get();
  }
}
?>
