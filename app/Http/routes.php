<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as' => 'home', 'uses'=> 'HomeController@index']);
Route::get('home', 'HomeController@index');

// Authentication routes...
Route::get('auth/login', ['as' => 'login','uses' =>'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'logout','uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
///{!!Auth::logout(); Session::flush();!!}
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::controllers([
   'password' => 'Auth\PasswordController',
]);


Route::get('controlEquipos/inventario/','InventarioController@listaEquipos');
Route::get('controlEquipos/inventario/{id_lab}/{id_cat}','InventarioController@listaEquiposCategoria');
Route::get('controlEquipos/inventarioDetalle/{id_item}','InventarioController@detalleEquipo');
Route::get('controlEquipos/inventario/nuevo/{id_lab}','InventarioController@nuevoEquipo');
Route::get('controlEquipos/inventarioDetalle/','InventarioController@detalleEquipo');
Route::get('controlEquipos/inventarioModificar/','InventarioController@modificarEquipo');
Route::get('controlEquipos/inventarioGuardarCambios/','InventarioController@guardarCambiosEquipo');
Route::get('controlEquipos/inventarioGuardar/','InventarioController@guardarEquipo');
Route::get('controlEquipos/inventarioGuardarCodigos/','InventarioController@guardarCodigosEquipos');
Route::get('controlEquipos/items/','InventarioController@dameEquiposArea');

Route::resource('controlEquipos/mantenimientos','MantenimientoController');


Route::get('controlAlumnos/acceso_alumnos/','AccesoAlumnoController@listaAcceso');
Route::get('controlAlumnos/acceso_alumnos1/','AccesoAlumnoController@listaAcceso1');

Route::get('controlAlumno/registrar_acceso','AccesoAlumnoController@registrarEntrada');
Route::get('controlAlumno/registrado','AccesoAlumnoController@alumnoRegistrado');
Route::get('controlAlumno/salida','AccesoAlumnoController@salidaAlumno');
Route::get('controlAlumno/entradasAlumno','AccesoAlumnoController@consultaAlumno');

Route::get('prestamos/consulta','PrestamoController@consultaPrestamo');
Route::post('prestamos/paginacion','PrestamoController@paginacion');
Route::resource('prestamos','PrestamoController');

Route::get('tipomulta/buscar','TipoMultaController@buscar');
Route::resource('tipomulta','TipoMultaController');


Route::get('alumno/nombre','AlumnoController@dameNombre');
Route::get('invitem/nombre','InventarioController@dameNombreEquipo');

Route::get('horario/materia','HorarioController@dameMateria');

Route::get('profesor/nombre','ProfesorController@dameNombre');
Route::resource('multas','MultaController');

Route::resource('becario','BecarioController');
Route::resource('area','AreaController');
Route::resource('labCategorias','LabCategoriaController');
Route::get('/profesor','ProfesorController@admin');

Route::resource('espacio','EspacioController');
