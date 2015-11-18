var band1 = false;
var band2 = false;


function verSubmenu1()
{
  if(!band1)
  {
    $("#submenu1").toggle('toggled');
    $("#submenu1").css('visibility','visible');
    band1 = true;
  }
}
function verSubmenu2()
{
  if(!band2)
  {
    $("#submenu2").toggle('toggled');
    $("#submenu2").css('visibility','visible');
    band2 = true;
  }
}

function ocultar()
{
  if(!band1)
  {
    if($("#submenu1").is(':visible'))
    {
      $("#submenu1").toggle('toggled');
      $("#submenu1").css('visibility','hidden');

    }
  }
  band1 = false;

  if(!band2)
  {
    if($("#submenu2").is(':visible'))
    {
      $("#submenu2").toggle('toggled');
      $("#submenu2").css('visibility','hidden');

    }
  }
  band2 = false;

}
