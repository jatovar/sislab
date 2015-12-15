var id_entrada = 0;
var ant = "";
var color = "";
var id_area = 1;
var pagina = 1;
function verOpciones(t)
{
  var y = (getOffset(t).top)-30;
  var x = ($("#contenido").width()/2)-$("#Opciones").width()/2;
  $("#Opciones").css('visibility','visible');
  $("#Opciones").css('top',y);
  $("#Opciones").css('left',x);
  id_entrada = t.id;

  if(ant!="")
  {
    ant.style.backgroundColor = color;
  }
  ant = t;
  color = t.style.color;
  t.style.backgroundColor = "#D4D4D4";

}
function getOffset( el ) {
    var _x = 0;
    var _y = 0;
    while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
        _x += el.offsetLeft - el.scrollLeft;
        _y += el.offsetTop - el.scrollTop;
        el = el.offsetParent;
    }
    return { top: _y, left: _x };
}
function cerrarOpciones()
{
  $("#Opciones").css('visibility','hidden');

}

$(document).on('click','.pagination a', function(e)
{
  e.preventDefault();
  pagina = $(this).attr('href').split('page=')[1];
  var data = {
    id_lab: ID_LABORATORIO,
    page: pagina
  }

  $.ajax({
    url: BASE_UR + "controlAlumnos/acceso_alumnos1",
    data: data,
    dataType:'html',
    type:'get',
    success: function(data) {

          $('#Tabla').html(data);
    }
  });
}
);
$('document').ready(function() {

  $('#boton').click(function() {
      $('#myModal').modal('show');
      $('#clave_alumno').attr('autofocus',true);
      $("#"+id_area).css("background-color","#C3C3C3");

  });
  $('#btnConsulta').click(function() {
      $('#ModalConsulta').modal('show');
  });
  $("#equipos").bind('select',function(){
    alert("sss");
  });

});

function dameNombreAlumno(){
    clave = $('#clave_alumno').val();
    var data = {
      clave_alumno: clave
    }

    $.ajax({
      url: BASE_UR + "/alumno/nombre",
      data: data,
      dataType:'json',
      type:'get',
      success: function(data) {
        if(data.success)
        {
          $('#nombre_alumno').val(data.nombre);
          if(data.nombre!= "")
            estaRegistrado();
        }
        else {
          $('#nombre_alumno').val("");
        }
      }
    });
}
function estaRegistrado()
{
  clave = $('#clave_alumno').val();
  var data = {
    cve_alumno: clave
  }

  $.ajax({
    url: BASE_UR + "controlAlumno/registrado",
    data: data,
    dataType:'json',
    type:'get',
    success: function(data) {
      if(data.success)
      {
        if(data.registrado)
          alert("Ya esta registrado");
      }
      else {
      }
    }
  });
}
function altaRegistro()
{
  if(($("#clave_alumno").val()) !="")
  {
    codigo = $("#codigo_lab").val();
    var data = $("#form1").serialize() + "&id_area="+id_area + "&codigo_lab="+codigo + "&id_lab="+ID_LABORATORIO+"&page="+pagina;

    $.ajax({
      url: BASE_UR + "controlAlumno/registrar_acceso",
      data: data,
      dataType:'html',
      type:'get',
      success: function(data) {
        {
          $('#myModal').modal('hide');
          $('#Tabla').html(data);
          borrarDatos();
        }
      }
    });
  }
}
function altaPrestamo()
{
  var id_prestamo = 'NULL';
  clave = $('#clave_alumno').val();
  codigo = $("#codigo_lab").val();
  var data =
  {
    "cve_solicitante": clave,
    "id_prestamo_item" : id_prestamo,
    "codigo_lab" : codigo,
    "tipo_solicitante": 1,
    "id_area": id_area
  }
  $.ajax({
    url: BASE_UR + "prestamo_equipo/alta",
    data: data,
    dataType:'json',
    type:'get',
    beforeSend: function () {

              },
    success: function(data) {
      if(data.success)
      {
        alert(data.id_prestamo);
        id_prestamo = data.id_prestamo;
        $('#myModal').modal('hide');

      }
      else {
        //$('#nombre_alumno').val("");
        alert(data.msj);
      }
    }
  });
  return id_prestamo;
}
function borrarDatos()
{
  $('#clave_alumno').val("");
  $('#nombre_alumno').val("");
  $('#codigo_lab').val("");
  $('#nombre_equipo').val("");
  $('#nota').val("");
}
function bajaRegistro()
{
  var data = {
    id_entrada: id_entrada
  }
  $.ajax({
    url: BASE_UR + "controlAlumno/salida",
    data: data,
    dataType:'json',
    type:'get',
    success: function(data) {
      if(data.success)
      {
        alert("Salida con exito");
        $("#"+id_entrada).remove();
        cerrarOpciones();

      }
      else {
        //$('#nombre_alumno').val("");
        alert(data.msj);
      }
    }
  });
}



function seleccionaArea(t)
{
  if(t.id != id_area)
  {
    $("#"+t.id).css("background-color","#C3C3C3");
    $("#"+id_area).css("background-color","#798D8F");
    id_area = t.id;
    dameEquipos();
  }
}

function dameEquipos()
{
  var data = {
    id_area: id_area
  }
  $.ajax({
    url: BASE_UR + "controlEquipos/items",
    data: data,
    dataType:'html',
    type:'get',
    success: function(data) {

        $("#equipos").html(data);

      }
  });
}




function cargar()
{
//  document.forms['form1'].elements['txtClave'].focus();
	var table = document.getElementById("tabla1");
	calculaTiempos(table);

	setTimeout(function(){cargar()}, 1000);

}
function calculaTiempos(table)
{

	for (var i = 1, row; row = table.rows[i]; i++)
	{
		colHoraE = row.cells[6];
		colHoraE.style.color = "blue";
		tiempo = colHoraE.innerHTML;
		h1 = parseInt(tiempo[0] + tiempo[1]);
		m1 = parseInt(tiempo[3] + tiempo[4]);
		s1 = parseInt(tiempo[6] + tiempo[7]);
		var Digital=new Date();
		h2=  parseInt(Digital.getHours());
		m2=  parseInt(Digital.getMinutes());
		s2=  parseInt(Digital.getSeconds());
		m = 0;
		s = 0;
		h = h2 - h1;
 		if(m2 >= m1)
		{
		 		m = m2 - m1;

		}
	 	else
	 	{
	 		if(h!=0)
	 		{
	 			h = h - 1;
	 		}
	 		m = (m2 + 59-m1);
	 	}
	 	if(s2 >= s1)
		 {
		 		s = s2 - s1;
		 }
	 	else
	 	{
	 		if(m>0)
	 		{
	 			m=m-1;
	 		}
	 		s = (s2 + 59-s1);
	 	}
	 	seg = "0"+s;

		if(seg.length==3)
		{
			seg = s;
		}
		min = "0"+m;

		if(min.length==3)
		{
			min = m;
		}
		hr = "0"+h;

		if(hr.length==3)
		{
			hr = h;
		}


		row.cells[7].innerHTML = hr+":"+min+":"+seg;


	}


}
