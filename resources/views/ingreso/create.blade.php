@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

<div class="panel panel-default cuadro">
	  <div class="panel-heading">
	    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> INGRESO NUEVO</h3>
	  </div>
	  <div class="panel-body">

	    {!!Form::open(['route'=>'ingreso.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}
	        @include('ingreso.forms.ingresoForm')
            <code>*Todos los campos son requeridos</code>
            @include('ingreso.forms.listaForm')
	        <div class="form-group">
		    	<div class="col-sm-offset-3 col-sm-9">
		    		{!!Form::submit('GUARDAR',['class'=>'btn btn-primary'])!!}
		    	</div>
		    </div>
	    {!!Form::close()!!}
	</div>
</div>

@stop



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Proveedor</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	    @include('proveedor.forms.proveedorForm')
	    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id="registro" class="btn btn-primary">Guardar</button>
      </div>
       
    </div>
  </div>
</div>