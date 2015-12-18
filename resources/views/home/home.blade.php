@extends('layouts.layout')
@extends('layouts.menu')
@section('contenido')



<div>
  <h1>BIENVENIDO</h1>
  </br>
  <div style="margin:30px;">

  <h3>Objetivo</h3>
      <p>
      Este sistema tiene como objetivo principal el poder facilitar el trabajo de los laboratorios de la facultad de ingeniería,
      teniendo un buen control de los equipos de cada laboratorio y así poder brindar un mejor servicio a los alumnos y
      profesores de cada área.
      </p>
  </br>
  <h3>Estrategias</h3>

  <ul>
      <li>Facilitar la petición de requerimientos por parte de los alumnos y profesores</li>
      <li>Llevar  el registro de los alumnos que ingresan a los laboratorios</li>
      <li>Inventario de los equipos de cada laboratorio</li>
      <li>Detección de alarmas cuando no se ha realizado un requerimiento</li>
  </ul>
  </br>
  <h3>Áreas</h3>
  <div class = "panel-group" id = "accordion">


     <div class = "panel panel-default">
        <div class = "panel-heading">
           <h4 class = "panel-title">
              <a data-toggle = "collapse" data-parent = "#accordion" href = "#collapseTwo">
                Área de Computación e Informática
              </a>
           </h4>
        </div>

        <div id = "collapseTwo" class = "panel-collapse collapse ">
           <div class = "panel-body">
                <a href="#" style="color: black;">Unidad de Desarrollo Integral</a>
                </br>
                <a href="#" style="color: black;">Laboratorio de Redes y Telemática</a>
                </br>
                <a href="#" style="color: black;">Laboratorio de Electrónica y Sistemas Digitales</a>
                </br>
                <a href="#" style="color: black;">Laboratorio de Hardware Avanzado</a>
                </br>
                <a href="#" style="color: black;">Laboratorio de Software y Aplicaciones</a>
                </br>
           </div>
        </div>

     </div>

     <div class = "panel panel-default">
        <div class = "panel-heading">
           <h4 class = "panel-title">
              <a data-toggle = "collapse" data-parent = "#accordion" href = "#collapseThree">
                 Área de metalurgía y materiales
              </a>
           </h4>
        </div>

        <div id = "collapseThree" class = "panel-collapse collapse ">
           <div class = "panel-body">
               <a href="#" style="color: black;">Microscopía</a>
               </br>
               <a href="#" style="color: black;">Centro de cómputo y servicio</a>
               </br>
               <a href="#" style="color: black;">Análisis de materiales</a>
               </br>
               <a href="#" style="color: black;">Extractiva</a>
               </br>
               <a href="#" style="color: black;">Materiales</a>
               </br>
               <a href="#" style="color: black;">Beneficio de materiales</a>
               </br>
           </div>
        </div>

     </div>

     <div class = "panel panel-default">
        <div class = "panel-heading">
           <h4 class = "panel-title">
              <a data-toggle = "collapse" data-parent = "#accordion" href = "#collapseFour">
                 Área agroindustrial
              </a>
           </h4>
        </div>

        <div id = "collapseFour" class = "panel-collapse collapse ">
           <div class = "panel-body">
               <a href="#" style="color: black;">Procesos alimentarios agropecuarios</a>
               </br>
               <a href="#" style="color: black;">Químico biológico</a>
               </br>
               <a href="#" style="color: black;">Procesos no alimentarios agropecuarios</a>
               </br>
           </div>
        </div>

     </div>
  </div>
  <h3>Contacto</h3>
    <p><strong>Dr. Francisco Eduardo Martínez Pérez</strong> (Encargado de los laboratoros de cómputo UDICEI)</p>
    <p>Tel. <strong> (444)1468874</strong></p>
  </br>
</div>
</div>
@stop
