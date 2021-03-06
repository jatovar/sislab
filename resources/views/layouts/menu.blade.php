@section('menu')
{!! Html::style('libs/bootstrap/css/menu.css') !!}
<div class = "cont-menu">
<ul class="nav navbar-nav  navbar-inverse" style="width:100%">
    <!-- ITEM BIENVENIDO -->
    <li class="active"><a href="/sislab/public">Bienvenido</span></a></li>

            <li  onclick="verSubmenu1()"  class="dropdown">
              <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Control de Alumnos<span class="caret"></span></a>
              <ul  id="submenu1" class="dropdown-menu">
                <li><a href="/sislab/public/controlAlumnos/acceso_alumnos">Acceso de Alumnos</a></li>
                <li><a href="/sislab/public/prestamos">Prestamo de equipo</a></li>
                @if (Session::get('id_lab') != 1)
                  <li><a href="#">Revisión de prácticas</a></li>
                @endif
                <li><a href="/sislab/public/multas">Multas</a></li>
            </ul>
            </li>


            <!-- ITEM CONTROL DE EQUIPOS -->
            <li onclick="verSubmenu2()" class="dropdown" >
              <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Control de Equipos <span class="caret"></span></a>
              <ul id="submenu2" class="dropdown-menu">
                <li><a href="/sislab/public/controlEquipos/inventario">Inventario</a></li>
                <li><a href="/sislab/public/controlEquipos/mantenimientos">Mantenimientos</a></li>
              </ul>
            </li>


            @if (Session::get('id_lab') != 1)
                <li><a href="#">Requerimientos</a></li>
                <li><a href="#">Prácticas</a></li>
            @endif
            <li class="dropdown">
              <a href="/sislab/public/becario/create" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/sislab/public/becario/create">Panel de Control</a></li>


              </ul>
            </li>



      @if (Auth::check())
            <li style="float:right"><a href="{!!URL::route('logout')!!}"> <strong>Cerrar Sesión</strong></a></li>

      @else
          <li style="float:right"><a href="{!!URL::route('login')!!}"> <strong>Iniciar Sesión</strong></a></li>
      @endif

  </ul>
</div>
</br>
</br>

@stop
