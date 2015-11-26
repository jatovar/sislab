var BASE_UR= "http://127.0.0.1/sislab/public/";
//$(function (){
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });
//});
var ID_USUARIO = "189780";
var TIPO_USUARIO = "Becario";
var ID_LABORATORIO = 1;
