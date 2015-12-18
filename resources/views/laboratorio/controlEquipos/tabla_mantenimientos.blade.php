<table class="table table-hover table-hove table-striped table-condensed table-bordered table-header-group table-responsive ">
<thead>
  <tr><th>Actividad</th>
  <th>Area</th>
  <th>Codigo Equipo</th>
  <th>Nombre Equipo</th>
  <th>Clave Responsable</th>
  <th>Nombre Responsable</td>
  <th>Descripción</th>
  <th>Fecha Realizado</th></tr>
</thead>
  <tbody>
    <?php
    $cont = 1;
    $total = 0;
    foreach ($mantenimientos as $mant => $m):
      $total = count($m->items());
      if($total > 0)
      {

        foreach($m->items() as $item => $i):
          echo "<tr>";
          if($cont==1)
          {
            echo "<td rowspan=\"".$total."\">".$m->actividad."</td>";
            echo "<td rowspan=\"".$total."\">".$m->labArea()->area."</td>";
          }
            echo"<td>".$i->item()->codigo_lab."</td>";
            echo"<td>".$i->item()->detalle()->nombre."</td>";

          if($cont == 1)
          {
            echo "<td rowspan=\"".$total."\">".$m->tipo_responsable."</td>";
            echo "<td rowspan=\"".$total."\">".$m->cve_responsable."</td>";
            echo "<td rowspan=\"".$total."\">".$m->descripcion."</td>";
            echo "<td rowspan=\"".$total."\">".$m->fecha_realizado."</td>";
          }
          $cont = $cont + 1;
          echo "</tr>";
        endforeach;
      }
      else {
        echo "<tr>";
          echo "<td rowspan=\"1\">".$m->actividad."</td>";
          echo "<td rowspan=\"1\">".$m->labArea()->area."</td>";
          echo "<td></td>";
            echo "<td></td>";
        echo "<td rowspan=\"1\">".$m->cve_responsable."</td>";

        echo "<td rowspan=\"1\">".$m->nombreResponsable()."</td>";
        echo "<td rowspan=\"1\">".$m->descripcion."</td>";
        echo "<td rowspan=\"1\">".$m->fecha_realizado."</td>";
        echo "</tr>";

      }
    endforeach; ?>


  </tbody>

</table>
