@section('menu')
{!! Html::style('libs/bootstrap/css/menu.css') !!}
<div>
<ul class="nav navbar-nav  navbar-inverse" style="width:100%">
    <li class="active"><a href="/sislab/public">Home</span></a></li>
    <li  onclick="verSubmenu1()"  class="dropdown">
      <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      Control de Alumnos<span class="caret"></span></a>
      <ul  id="submenu1" class="dropdown-menu">
        <li><a href="/sislab/public/controlAlumnos/acceso_alumnos?id_lab=1">Acceso de Alumnos</a></li>
        <li><a href="/sislab/public/controlAlumnos/prestamo_equipos?id_lab=1">Prestamo de equipo</a></li>
        <li><a href="#">Revisión de prácticas</a></li>
        <li><a href="#">Multas</a></li>


    </ul>
    </li>
    <li onclick="verSubmenu2()" class="dropdown" >
      <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Control de Equipos <span class="caret"></span></a>
      <ul id="submenu2" class="dropdown-menu">
        <li><a href="/sislab/public/controlEquipos/inventario/2">Inventario</a></li>
        <li><a href="/sislab/public/controlEquipos/mantenimientos/2">Mantenimientos</a></li>
      </ul>
    </li>
    <li><a href="#">Requerimientos</a></li>
    <li><a href="#">Prácticas</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Becarios</a></li>
        <li><a href="#">Multas</a></li>

      </ul>
    </li>

  </ul>
<div>
</br>
</br>

@stop
