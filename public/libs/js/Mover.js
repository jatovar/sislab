var dragSrcEl = null;
var cols = document.querySelectorAll('.Columnas');
[].forEach.call(cols, function(col)
{
    col.addEventListener('dragstart', handleDragStart, false);
    col.addEventListener('dragenter', handleDragEnter, false);
    col.addEventListener('dragover', handleDragOver, false);
    col.addEventListener('dragleave', handleDragLeave, false);
    col.addEventListener('drop', handleDrop, false);
    col.addEventListener('dragend', handleDragEnd, false);
});


var Elimina = document.querySelector('#Baja_Alumnos');
Elimina.addEventListener('dragstart', handleDragStart, false);
Elimina.addEventListener('dragenter', handleDragEnter, false);
Elimina.addEventListener('dragover', handleDragOver, false);
Elimina.addEventListener('dragleave', handleDragLeave, false);
Elimina.addEventListener('drop', handleDrop, false);
Elimina.addEventListener('dragend', handleDragEnd, false);


function handleDragStart(e)
{
  dragSrcEl = this;
  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.innerHTML);
}

function handleDragOver(e)
{
  if (e.preventDefault)
  {
    e.preventDefault();
  }
  e.dataTransfer.dropEffect = 'move';
  return false;
}

function handleDragEnter(e)
{
  if(this.id == "Baja_Alumnos")
  {
    this.style.border = "2px solid red";
  }
}

function handleDragLeave(e)
{
  document.getElementById('Baja_Alumnos').style.border = "1px dashed black";
}

function handleDrop(e)
{
  if(this.id == "Baja_Alumnos")
  {
    alert("Eliminar");
    id_entrada = dragSrcEl.id;
    bajaRegistro();
  }
  return false;
}

function handleDragEnd(e)
{
  document.getElementById('Baja_Alumnos').style.border = "1px dashed black";
}
