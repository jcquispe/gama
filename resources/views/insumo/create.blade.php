@extends('layouts.'.Auth::user()->tipo)

@section('contenido')
	    <div class="panel panel-default cuadro">
			  <div class="panel-heading">
			    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> INSUMO NUEVO</h3>
			  </div>
			  <div class="panel-body">
	    
			    {!!Form::open(['route'=>'insumo.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}
			        @include('insumo.forms.insumoForm')

                    
				  <div class="form-group">
					  {!!Form::label('partida', 'Partida:', ['class'=>'col-sm-3 control-label'])!!}
					  <div class="col-sm-9">
						  <select id="partida" name="partida" class="form-control">
							  <option value="">-Seleccione-</option>
							  	@foreach($partidas as $par)
				            		<option value={{$par['codigo']}}>{{$par['codigo']}} - {{$par['descripcion']}}</option>
				            	@endforeach
						  </select>
					  </div>
				  </div>

				  <input type="text" id="descrip" name="descrip" value="" hidden>

				    <div class="form-group">
				    	<div class="col-sm-offset-3 col-sm-9">
				    		{!!Form::submit('GUARDAR',['class'=>'btn btn-primary'])!!}
				    	</div>
				    </div>
			    {!!Form::close()!!}
			</div>
		</div>
@stop
