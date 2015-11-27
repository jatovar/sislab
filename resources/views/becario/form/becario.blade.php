<div class="form-group ">
  {!!Form::label('lbclave','Clave UASLP:')!!}
  {!!Form::text('cve_uaslp',null,['id'=>'cve','class'=>'form-control','placeholder'=>'Ingrese la clave unica: '])!!}
</div>
<div class="form-group">
  {!!Form::label('lbrpe','RPE :')!!}
  {!!Form::text('rpe',null,['id'=>'rpe','class'=>'form-control','placeholder'=>'Ingrese el RPE'])!!}
</div>
<div class="form-group">
  {!!Form::label('password','Nueva contraseña:')!!}
  {!!Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>'Ingrese la contraseña'])!!}

</div>
