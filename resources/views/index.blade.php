
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <title>SIAA - Login</title>
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/style.css') !!}
  </head>

  <body>
    <div class="container">
      @include('alerts.error')
      <div class="info">
        <h1>SIAA</h1><span><a href="#">Municipio de Achacachi</a></span>
      </div>
    </div>
    <div class="form">
      <div class="thumbnail"><img src="img/logo.png"/></div>
     {!!Form::open(['route'=>'soluser.store', 'method'=>'POST', 'class'=>'register-form'])!!}
        {!!Form::text('nombre',null,['placeholder'=>'Nombre Completo'])!!}
        {!!Form::text('ci',null,['placeholder'=>'Numero de CI'])!!}
        {!!Form::select('exp', ['LP' => 'LA PAZ', 'OR' => 'ORURO', 'CB' => 'COCHABAMBA', 'SC' => 'SANTA CRUZ', 'PO' => 'POTOSI', 'TA' => 'TARIJA', 'CH' => 'CHUQUISACA', 'BE' => 'BENI', 'PA' => 'PANDO'],null,['class'=>'form-control'])!!}
        {!!Form::text('dependencia',null,['placeholder'=>'Dependencia'])!!}
        {!!Form::text('email',null,['placeholder'=>'Correo Electrónico'])!!}
        {!!Form::submit('Solicitar',['class'=>'btn btn-default'])!!}
        <p class="message">Ya estas registrado? <a href="#">Ingresar</a></p>
      {!!Form::close()!!}
      
      {!!Form::open(['route'=>'log.store', 'method'=>'POST', 'class'=>'ingreso-form'])!!}
        {!!Form::text('usuario',null,['placeholder'=>'Usuario'])!!}
        {!!Form::password('pass',['placeholder'=>'Contraseña'])!!}
        {!!Form::submit('Entrar',['class'=>'btn btn-default'])!!}
        <p class="message">No estas registrado? <a href="#">Solicita una cuenta</a></p>
      {!!Form::close()!!}
    </div>
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/index.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
  </body>
</html>
