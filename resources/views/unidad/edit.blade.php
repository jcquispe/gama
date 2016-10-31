@extends('layouts.'.Auth::user()->tipo)

@section('contenido')

	    <div class="panel panel-default cuadro">
			  <div class="panel-heading">
			    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> EDICIÓN UNIDAD</h3>
			  </div>
			  <div class="panel-body">
	    
			    {!!Form::model($unidad,['route'=>['unidad.update', $unidad->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}
			        @include('unidad.forms.unidadForm')

                    <div class="form-group">
			        	{!!Form::label('dependencia', 'Dependencia:', ['class'=>'col-sm-3 control-label'])!!}
				        <div class="col-sm-9">
				            <select id="dependencia" name="dependencia" class="form-control">
				            @foreach($unidads as $uni)
				                @if($unidad->dependencia==0)
				                    <option value=0>Ninguno</option>
				                @else
    				            	@if($unidad->dependencia==$uni->id)
    				            		<option value={{$uni['id']}} selected>{{$uni['denominacion']}}</option>
    				            	@else
    				            		<option value={{$uni['id']}}>{{$uni['denominacion']}}</option>
    				            	@endif
    				            @endif
				            @endforeach	
				        	</select>
				        </div>
			        </div>
			        
			        @if($unidad->vigente==1)
    			        <div class="form-group">
    					    {!!Form::label('vigente', 'Unidad activa', ['class'=>'col-sm-3 control-label'])!!}
    					    <div class="col-sm-9">
    					        {!!Form::checkbox('vigente', true, true);!!}
    					    </div>
    					</div>
    					@else
    					<div class="form-group">
    					    {!!Form::label('vigente', 'Unidad activa', ['class'=>'col-sm-3 control-label'])!!}
    					    <div class="col-sm-9">
    					        {!!Form::checkbox('vigente', true, false);!!}
    					    </div>
    					</div>
					@endif
                    
			        <div class="form-group">
			    	<div class="col-sm-offset-3 col-sm-9">
			    		{!!Form::submit('ACTUALIZAR',['class'=>'btn btn-primary'])!!}
			    	</div>
			    </div>
			    {!!Form::close()!!}
			</div>
		</div>

@stop
