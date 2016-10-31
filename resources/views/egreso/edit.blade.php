@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

<div class="panel panel-default cuadro">
	  <div class="panel-heading">
	    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> NUEVO EGRESO</h3>
	  </div>
	  <div class="panel-body">

	    {!!Form::open(['route'=>'egreso.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}
	        @include('egreso.forms.cabeceraForm')
      </div>
</div>
            @include('egreso.forms.listaForm')
	        <div class="form-group">
		    	<div class="col-sm-offset-3 col-sm-9">
		    		{!!Form::submit('GUARDAR',['class'=>'btn btn-primary'])!!}
		    	</div>
		    </div>
	    {!!Form::close()!!}
	</div>
</div>

@stop