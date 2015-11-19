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

Route::get('/', function () {
    return view('laboratorio.index');
});
Route::get('controlEquipos/inventario/{id_lab}','InventarioController@listaEquipos');

Route::get('controlEquipos/inventario/detalle/{id_item}','InventarioController@detalleEquipo');
Route::get('controlEquipos/inventario/nuevo/{id_lab}','InventarioController@nuevoEquipo');

Route::get('controlEquipos/inventarioDetalle/','InventarioController@detalleEquipo');
Route::get('controlEquipos/inventarioModificar/','InventarioController@modificarEquipo');
Route::get('controlEquipos/inventarioGuardarCambios/','InventarioController@guardarCambiosEquipo');
Route::get('controlEquipos/inventarioGuardar/','InventarioController@guardarEquipo');
Route::get('controlEquipos/inventarioGuardarCodigos/','InventarioController@guardarCodigosEquipos');
Route::get('controlEquipos/items/','InventarioController@dameEquiposArea');



Route::get('controlEquipos/mantenimientos/{id_lab}','MantenimientoController@listaMantenimientos');
Route::get('controlEquipos/mantenimiento/alta','MantenimientoController@altaMantenimiento');


Route::get('controlAlumnos/acceso_alumnos/','AccesoAlumnoController@listaAcceso');
Route::get('controlAlumnos/acceso_alumnos1/','AccesoAlumnoController@listaAcceso1');

Route::get('controlAlumno/registrar_acceso','AccesoAlumnoController@registrarEntrada');
Route::get('controlAlumno/registrado','AccesoAlumnoController@alumnoRegistrado');
Route::get('controlAlumno/salida','AccesoAlumnoController@salidaAlumno');

Route::get('prestamo_equipos/','PrestamoEquipoController@listaPrestamos');
Route::get('prestamo_equiposPaginacion/','PrestamoEquipoController@listaPrestamosPaginacion');

Route::get('prestamo_equipo/alta','PrestamoEquipoController@registrarPrestamo');

Route::get('alumno/nombre','AlumnoController@dameNombre');
Route::get('invitem/nombre','InventarioController@dameNombreEquipo');

Route::get('horario/materia','HorarioController@dameMateria');

Route::get('profesor/nombre','ProfesorController@dameNombre');
